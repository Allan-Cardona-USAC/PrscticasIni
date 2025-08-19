<?php

namespace App\Http\Controllers\Administrativo;

use App\Administrativo;
use App\Http\Controllers\Controller;
use App\Models\UsuarioAccion;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class HomeController extends Controller
{

    protected $redirectTo = '/administrativo/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.cuentaDesactivada:administrativo',
        ['only' => [
        'index'
    ]]);
    }

    /**
     * Muestra el dashboard del usuario administrativo.
     *(muestra el perfil)
     * @return Response
     */
    public function index() {
        $title = 'Perfil';
        return view('administrativo.home',compact('title'));
    }

    /**
     * Direcciona a la página para editar los datos del perfil
     * @return Factory|View
     */
    public function editarPerfil(){
        #titulo de la página
        $title = 'Editar Perfil';
        return view('administrativo.editarPerfil',compact('title'));
    }

    /**
     * Guardar Datos editados del perfil
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function  guardarPerfil(Request $request){
        #titulo de la página
        $title = 'Perfil';

        #valida que no haya dejado en blanco el email y número de telefono
        $this->validate($request, [
            'mail' => 'required',
            'cel' => 'required|max:18',
        ]);
        #salto de linea, espacio, tabulación
        $order   = array("\r\n", "\n", "\r"," ");
        #remplaza los caracteres anteriormente descritos por coma
        $correos = str_replace($order,',',$request['mail']);
        $telefonos = str_replace($order,',',$request['cel']);

        #se obtiene el usuario con la sesión iniciada
        $usuarioActual = Administrativo::where('dependencia',Auth::guard('administrativo')->user()->dependencia)
            ->where('login',Auth::guard('administrativo')->user()->login)->firstOrFail();

        $usuarioActual->mail = $correos;
        $usuarioActual->cel = $telefonos;

        $editar = $usuarioActual->save(); # se guardan los datos editados por el usuario

        if($editar){
            #si no hubo error al guardar muestra mensaje de exito.
            $request->session()->flash('alert-success', 'Datos guardados con éxito');
        }else{
            #si hubo error muestra mensaje de error
            $request->session()->flash('alert-danger', 'No se guardo correctamente');
        }
        return redirect(route('administrativo.dashboard'))->with($title,'title');
    }


    /**
     * Cambiar Contraseña
     * Este método sirve para que el usuario pueda cambiar su contraseña
     * @param Request $request
     * @return Factory|View
     * @throws ValidationException
     */
    public  function  cambiarPassword(Request $request)
    {
        #titulo de la página
        $title = 'Perfil';

        #valida el campo password y que haya llenado el campo de confimación contraseña
        $this->validate($request, [
            'password' => 'required|confirmed|min:8'
        ]);

        #se obtiene el usuario con la sesión iniciada
        $usuarioActual = Administrativo::where('dependencia',Auth::guard('administrativo')->user()->dependencia)
            ->where('login',Auth::guard('administrativo')->user()->login)->firstOrFail();

        #Se verifica que el usuario haya ingresado su contraseña actual para poder cambiar su contraseña
        if(Hash::check($request['passActual'],$usuarioActual->pwd_hash)){
            $mensaje_error = '';

            #si el usuario introdujo una contraseña fuerte
            if($this->passwordFuerte($request['password'],$mensaje_error)) {

                //$usuarioActual->pwd = $request['password']; #se guarda la contraseña
                $usuarioActual->pwd_hash = bcrypt($request['password']); #se encripta la contraseña
                $nuevaPassword = $usuarioActual->save(); # se guarda la nueva contraseña del usuario

                if ($nuevaPassword) {
                    #si no hay error al guardar muestra mensaje de éxito.
                    $request->session()->flash('alert-success', 'La contraseña fue cambiada con éxito');
                }
            }else{
                #si no ingresa una contraseña fuerte devuelve un mensaje de error
                $request->session()->flash('alert-warning', $mensaje_error);
            }
        }else{
            #si la contraseña actual no coincide con la que el usuario ingreso para cambiar su contraseña
            $request->session()->flash('alert-warning', 'Contraseña Incorrecta');
        }

        return redirect(route('administrativo.dashboard'))->with($title,'title');

    }

    /**
     * Contraseña Fuerte - Password Fuerte
     * Este metodo corrobora si el usuario a ingresado una contraseña
     * fuerte, de no ser asi retorna un mensaje de error
     * @param $password
     * @param $error_password
     * @return bool
     */
    private function passwordFuerte($password, &$error_password){

        if (!preg_match('`[a-z]`',$password)){
            $error_password = "La contraseña debe tener al menos una letra minúscula";
            return false;
        }
        if (!preg_match('`[A-Z]`',$password)){
            $error_password = "La contraseña debe tener al menos una letra mayúscula";
            return false;
        }
        if (!preg_match('`[0-9]`',$password)){
            $error_password = "La contraseña debe tener al menos un número";
            return false;
        }
        $error_password = "";
        return true;
    }

    /**
     * Metodo que muestra la página de acceso restringido
     * @return Factory|View
     */
    public function accesoRestringido(){
        $title = 'Acceso Restringido';
        return view('administrativo.accesoRestringido',compact('title'));
    }


    public  function  cuentaDesactivada(){
        $title = 'Cuenta Desactivada';
        return view('administrativo.usuarioDesactivado',compact('title'));
    }

}
