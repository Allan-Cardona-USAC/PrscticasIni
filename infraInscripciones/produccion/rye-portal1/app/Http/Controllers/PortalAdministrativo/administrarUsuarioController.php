<?php


namespace App\Http\Controllers\PortalAdministrativo;

use App\Administrativo;
use App\Models\AplicacionUsuario;
use App\Models\Permiso;
use App\Models\RolAplicaciones;
use App\Models\UsuarioAccion;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class administrarUsuarioController extends  Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.administrarUsuario:administrativo');
        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }

    /**
     * Despliegue del listado de los usuarios existentes.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $title = 'Usuarios';
        $keyword = $request->get('search');
        $perPage = min($request->get('page_size'), 50);

        if (!empty($keyword)) {
            $usuarios = Administrativo::where('login', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('dependencia', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $usuarios = Administrativo::paginate($perPage);
        }

        return view('administrativo.usuarios.index', compact('usuarios','title','perPage', 'keyword'));
    }

    /**
     * Display the specified resource.
     *
     * @param $dependencia
     * @param $usuario
     * @return View
     */
    public function show($dependencia,$usuario)
    {
        $title="Ver Usuario";
        $usuarios = Administrativo::where('dependencia',$dependencia)->where('login',$usuario)->firstOrFail();
        return view('administrativo.usuarios.showPermisos', compact('usuarios','title'));
    }

    /**
     * Mostrar los permisos de usuario y poder cambiar.
     *
     * @param $dependencia
     * @param $usuario
     * @return View
     */
    public function editarPermisos($dependencia,$usuario)
    {
        $title="Editar Permisos Usuario";
        $usuarios = Administrativo::where('dependencia',$dependencia)->where('login',$usuario)->firstOrFail();
        $permisos_usuario = $usuarios->getPermisosUsuario();
        $permisos = Permiso::all();
        $roles = RolAplicaciones::all();
        return view('administrativo.usuarios.editarPermisos', compact('usuarios','permisos_usuario','permisos','roles','title'));
    }


    /**
     * Envio de email al usuario por cambio en permisos.
     *
     * @param Request $usuario
     * @return void
     */

    public function sendMailPermisos(Request $usuario)
    {
        $usuarioData = $usuario->all();

        $emailsSolicitante = explode(',',$usuarioData['correos']);

        Mail::send('portalAdministrativo.mails.actualizacionPermisos',['usuario' => $usuario], function ($message) use ($usuario, $emailsSolicitante) {
            $message->to($emailsSolicitante)->subject('Permisos en Portal Administrativo de Registro y Estadística, USAC');
        });
    }


    /**
     * Envio de email al usuario por usuario desactivado.
     *
     * @param Request $usuario
     * @return void
     */

    public function sendMailUsuarioDesactivado(Request $usuario)
    {
        $usuarioData = $usuario->all();

        $emailsSolicitante = explode(',',$usuarioData['correos']);

        Mail::send('portalAdministrativo.mails.usuarioDesactivado',['usuario' => $usuario], function ($message) use ($usuario, $emailsSolicitante) {
            $message->to($emailsSolicitante)->subject('Usuario Desactivado de Portal Administrativo de Registro y Estadística, USAC');
        });
    }
    
    /**
     * Actualizar los nuevos permisos.
     *
     * @param $dependencia
     * @param $usuario
     * @return View
     */
    public function actualizarPermisos(Request $request,$dependencia,$usuario)
    {
        $usuarios = Administrativo::where('dependencia',$dependencia)->where('login',$usuario)->firstOrFail();

        // Obtener los nuevos permisos asignados
        $rol = $request['idrolAplicacion'];


        //Almacenar los permisos del usuario
        $borrarRol = AplicacionUsuario::where('aplicacion_codigo',15)
            ->where('usuario_dependencia',$dependencia)->where('usuario_login',$usuario)->get()->first();

        if(!is_null($borrarRol)){
            $borrarRol->delete();
        }

        $nuevoRol = new AplicacionUsuario();

        $nuevoRol->aplicacion_codigo = 15;
        $nuevoRol->usuario_dependencia = $dependencia;
        $nuevoRol->usuario_login = $usuario;
        $nuevoRol->idrolAplicacion = $rol;

        $nuevoRol->save();

        #se actualiza su fecha de desactivación si hubo algun cambio
        $usuarios->fecha_desactivacion = $request['fecha_desactivacion'];

        #se guardan los datos
        $usuarios->save();

        $request->request->add(['nombre'=> $usuarios->nombre]);
        $request->request->add(['correos'=> $usuarios->mail]);

        #se manda a llamar el metodo para mandarle correo al usuario de que sus permisos fueron actualizados
        if($usuarios->mail != null) {
            $this->sendMailPermisos($request);
        }

        $request->session()->flash('alert-success', 'Usuario editado con exito');
        return redirect()->route('administrativo.usuarios.show',[$dependencia,$usuario]);
    }

    /**
     * Desactivar un usuario
     * se le coloca la fecha '2018-01-01' como valor por defecto para tomarlo como vencido
     * si se llega a desactivar antes de su fecha limite.
     * @param Request $request
     * @param $dependencia
     * @param $usuario
     * @return RedirectResponse
     */
    public function usuarioDesactivado(Request $request, $dependencia, $usuario){

        #se optiene el usuario el cual se va a desactivar
        $usuarios = Administrativo::where('dependencia',$dependencia)->where('login',$usuario)->firstOrFail();

        #se le coloca la fecha para tomarlo como desactivado
        //$usuarios->fecha_desactivacion = '2018-01-01';
        $usuarios->fecha_desactivacion = Carbon::now();

        #se guarda la información
        $usuarios->save();

        #se agrega el nombre y el correo al request.
        $request->request->add(['nombre'=> $usuarios->nombre]);
        $request->request->add(['correos'=> $usuarios->mail]);

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 3;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Se desactivo el usuario: ' . $usuario . ' con dependencia:' . $dependencia;
        $auditoria->fecha_accion = Carbon::now();

        #se manda a llamar el metodo para mandarle un correo al usuario que ha sido desactivado
        $this->sendMailUsuarioDesactivado($request);

        $request->session()->flash('alert-success', 'Usuario desactivado con exito');

        return redirect()->route('administrativo.usuarios');
    }


}
