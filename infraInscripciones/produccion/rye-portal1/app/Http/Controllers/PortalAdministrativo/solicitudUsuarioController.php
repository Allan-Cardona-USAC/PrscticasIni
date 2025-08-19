<?php

namespace App\Http\Controllers\PortalAdministrativo;
use App\Administrativo;
use App\Models\AplicacionUsuario;
use App\Models\Permiso;
use App\Models\RolAplicaciones;
use App\Models\UsuarioAccion;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Session;
use Log;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use Illuminate\Support\Facades\DB;
use App\Models\SolicitudUsuario;
use App\PortalAdministrativo\facultad;
use Illuminate\Http\Request;

class solicitudUsuarioController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo',
            ['except' => [
                'storeExterno',
                'sendMailApplicant',
                'sendMailEncargadoSolicitud',
                'solicitarusuario',
                'refreshCaptcha'
        ]]);
        $this->middleware('administrativo.administrarUsuario:administrativo',
            ['except' => [
                'storeExterno',
                'sendMailApplicant',
                'sendMailEncargadoSolicitud',
                'solicitarusuario',
                'refreshCaptcha'
    ]]);
        $this->middleware('administrativo.cuentaDesactivada:administrativo',
            ['except' => [
            'storeExterno',
            'sendMailApplicant',
            'sendMailEncargadoSolicitud',
            'solicitarusuario',
            'refreshCaptcha'
        ]]);
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $title = 'Solicitudes de Usuario';
        $keyword = $request->get('search');
        $perPage = min($request->get('page_size'), 50);
        $tipo = $request->get('tipo');

        if (!empty($keyword)) {
            $solicitudusuario = SolicitudUsuario::where('CUI', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('apellidos', 'LIKE', "%$keyword%")
                ->when($tipo != 'T' && !empty($tipo),function ($query) use ($tipo) {
                    return $query->where('estado_idestado', '=', 0)
                        ->where('tipo','=',$tipo);
                })
                ->paginate($perPage);
        } else {
            $solicitudusuario = SolicitudUsuario::where('estado_idestado', '=', 0)
                ->when($tipo != 'T' && !empty($tipo),function ($query) use ($tipo) {
                    return $query->where('tipo','=',$tipo);
                })
                ->paginate($perPage);
        }

        return view('portalAdministrativo.solicitud-usuario.index', compact('solicitudusuario','title','perPage', 'keyword','tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $title = 'Crear Solicitud Usuario';
        $dependencias = DB::table('dependencia')->where('sector','!=', 'interno')->get();
        $dependenciasInterno = DB::table('dependencia')->where('sector','=', 'interno')->get();
        return view('portalAdministrativo.solicitud-usuario.create',compact('title','dependencias','dependenciasInterno'));
    }

    /**
     * Se encarga de almacenar las solicitudes realizadas
     * fuera del portal administrativo
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function storeExterno(Request $request)
    {
        $this->validate($request, [
            'idsolicitud' => 'integer',
            'tipo' => 'required|max:1',
            'CUI' => 'required|max:13',
            'nombre' => 'required|max:45',
            'nom_corto' => 'required|max:100',
            'apellidos' => 'required|max:45',
            //'fecha' => 'date_format:"d-m-Y"',
            'correo_institucional' => 'email|nullable',
            'correo_personal' => 'required|email',
            'telefono_cel' => 'required|integer',
            'telefono_trabajo' => 'integer|nullable',
            'telefono_casa' => 'integer|nullable',
            'registro_personal' => 'required_if:tipo,I|integer|nullable',
            'institucion' => 'required_if:tipo,E|max:200',
            'autoridad_responsable' => 'required_if:tipo,E|max:200',
            'puesto' => 'required|max:200',
            'copia_dpi' => 'required|max:400|nullable|mimes:pdf',
            'copia_oficio' => 'required|max:400|nullable|mimes:pdf',
            //'estado_idestado' => 'integer',
            'dependencia_iddependencia' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
            
        ]);
        
        //Validaciones de solicitudes pendientes.
        $solicitud = SolicitudUsuario::where('CUI','=',$request['CUI'])->first();

        if ($solicitud != null && ($solicitud['estado_idestado'] === 0 || $solicitud['estado_idestado'] === 1) )
        {
            return redirect()->back()->with('alert', 'Ya tiene una solicitud pendiente o aprobada');
        }

        //Guardar archivos
        $requestData = $request->all();
        if ($request->hasFile('copia_dpi')) {
            $requestData['copia_dpi'] = $request->file('copia_dpi')
                ->store('uploads/dpis', 'public');
        }
        if ($request->hasFile('copia_oficio')) {
            $requestData['copia_oficio'] = $request->file('copia_oficio')
                ->store('uploads/oficios', 'public');
        }


        //Envío de correos a solicitante.
        $this->sendMailApplicant($request);

        //Envío de correos a encargados.
        $this->sendMailEncargadoSolicitud($request);

        //Almacenamiento de solicitud en base de datos.
        SolicitudUsuario::create($requestData);

        return redirect('/administrativo/login')->with('alert', 'Solicitud enviada con éxito. ');

    }


    /**
     * Se encarga de almacenar las solicitudes realizadas dentro
     * del portal administrativo
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'idsolicitud' => 'integer',
            'tipo' => 'required|max:1',
            'CUI' => 'required|max:13',
            'nombre' => 'required|max:45',
            'nom_corto' => 'required|max:100',
            'apellidos' => 'required|max:45',
            //'fecha' => 'date_format:"d-m-Y"',
            'correo_institucional' => 'email|nullable',
            'correo_personal' => 'required|email',
            'telefono_cel' => 'required|integer',
            'telefono_trabajo' => 'integer|nullable',
            'telefono_casa' => 'integer|nullable',
            'registro_personal' => 'required_if:tipo,I|integer|nullable',
            'institucion' => 'required_if:tipo,E|max:200',
            'autoridad_responsable' => 'required_if:tipo,E|max:200',
            'puesto' => 'required|max:200',
            'copia_dpi' => 'required|max:400|nullable|mimes:pdf',
            'copia_oficio' => 'required|max:400|nullable|mimes:pdf',
            'dependencia_iddependencia' => 'required',
            //'estado_idestado' => 'integer',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        //Validaciones de solicitudes pendientes.
        $solicitud = SolicitudUsuario::where('CUI','=',$request['CUI'])->first();

        if ($solicitud != null && ($solicitud['estado_idestado'] === 0 || $solicitud['estado_idestado'] === 1) )
        {
            return redirect()->back()->with('alert', 'Ya tiene una solicitud pendiente o aprobada');
        }

        //Guardar archivos
        $requestData = $request->all();
        if ($request->hasFile('copia_dpi')) {
            $requestData['copia_dpi'] = $request->file('copia_dpi')
                ->store('uploads/dpis', 'public');
        }
        if ($request->hasFile('copia_oficio')) {
            $requestData['copia_oficio'] = $request->file('copia_oficio')
                ->store('uploads/oficios', 'public');
        }


        //Envío de correos a solicitante.
        $this->sendMailApplicant($request);

        //Envío de correos a encargados.
        $this->sendMailEncargadoSolicitud($request);

        //Almancenamiento de solicitud en base de datos.
        SolicitudUsuario::create($requestData);

        return redirect('/solicitud-usuario')->with('alert', 'Solicitud enviada con éxito. ');

    }

    /**
     * Envio de email al solicitante.
     *
     * @param Request $solicitante
     * @return void
     */

    public function sendMailApplicant(Request $solicitante)
    {
        $solicitanteData = $solicitante->all();

        Mail::to($solicitanteData['correo_personal'])->send(new Email($solicitante,'Solicitud de Usuario en Portal Administrativo de Registro y Estadística, USAC'));
        if($solicitanteData['correo_institucional'] != null)
        {
            Mail::to($solicitanteData['correo_institucional'])->send(new Email($solicitante,'Solicitud de Usuario en Portal Administrativo de Registro y Estadística, USAC'));
        }
    }

    /**
     * Envio de correo a los usuarios que tengan
     * permiso de aceptar/denegar solicitudes
     *
     * @param Request $request
     *
     */

    public function sendMailEncargadoSolicitud($request)
    {
        //Obtener email de jefes y almacenarlos en un array.
        $correosJefe = DB::table('usuario')->select('mail')->where('puesto','=','Administrador Portal')->where('dependencia','=','rye')->get();
        $emailsJefe=[];
        foreach($correosJefe as $correo){
            $emailsJefe[]=$correo->mail;
        }

        Mail::send('portalAdministrativo.mails.encargados', $emailsJefe, function ($message) use ($request, $emailsJefe) {
            $message->to($emailsJefe)->subject('Nueva solicitud de usuario de Portal Administrativo.');;
        });


        //Obtener email de secretaria Jefatura
        /*$correosSecreJefe = DB::table('usuario')->select('mail')->where('puesto', '=', 'Secretaria Jefatura')->where('dependencia', '=', 'rye')->get();
        $emailsSecreJefe= [];
        foreach($correosSecreJefe as $correo){
            $emailsSecreJefe[]=$correo->mail;
        }

        Mail::send('portalAdministrativo.mails.encargados', $emailsSecreJefe, function ($message) use ($request, $emailsSecreJefe) {
            $message->to($emailsSecreJefe)->subject('Nueva solicitud de usuario de Portal Administrativo.');;
        });

        //Obtener email de secretaria subJefatura
        $correosSecreSubJefe = DB::table('usuario')->select('mail')->where('puesto', '=', 'Secretaria SubJefatura')->where('dependencia', '=', 'rye')->get();
        $emailsSecreSubJefe= [];
        foreach($correosSecreSubJefe as $correo){
            $emailsSecreSubJefe[]=$correo->mail;
        }

        Mail::send('portalAdministrativo.mails.encargados', $emailsSecreSubJefe, function ($message) use ($request, $emailsSecreSubJefe) {
            $message->to($emailsSecreSubJefe)->subject('Nueva solicitud de usuario de Portal Administrativo.');;
        });*/
        
    }

    /**
     * Este método redirige a la vista de la Solicitud
     * de usuario externo.
     *
     */

    public function solicitarusuario()
    {
        $title='Solicitar Usuario';
        $dependencias = DB::table('dependencia')->where('sector','!=', 'interno')->get();
        $dependenciasInterno = DB::table('dependencia')->where('sector','=', 'interno')->get();
        return view('portalAdministrativo.solicitud-usuario.solicitarusuario', compact('title','dependencias','dependenciasInterno'));
    }

    /**
     * Este método refresca el captcha en las solicitudes
     * de usuario.
     *
     */

    public function refreshCaptcha()
    {
        return captcha_img();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function show($id)
    {
        $title = 'Ver Solicitudes de Usuario';
        $solicitudusuario = SolicitudUsuario::findOrFail($id);

        return view('portalAdministrativo.solicitud-usuario.show', compact('solicitudusuario','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function edit($id)
    {
        $title = 'Editar Solicitudes de Usuario';
        $solicitudusuario = SolicitudUsuario::findOrFail($id);

        return view('portalAdministrativo.solicitud-usuario.edit', compact('solicitudusuario','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     *
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $title = 'Actualizar Solicitudes de Usuario';
        $this->validate($request, [
			'idsolicitud' => 'integer',
			'tipo' => 'required|max:1',
			'CUI' => 'required|max:13',
			'nombre' => 'required|max:45',
			'nom_corto' => 'required|max:100',
			'apellidos' => 'required|max:45',
			//'fecha' => 'date_format:"d-m-Y"',
			'correo_institucional' => 'email',
			'correo_personal' => 'required|email',
			'telefono_cel' => 'required|integer',
			'telefono_trabajo' => 'integer',
			'telefono_casa' => 'integer',
			'registro_personal' => 'integer',
			'institucion' => 'required|max:200',
			'autoridad_responsable' => 'required|max:200',
			'puesto' => 'required|max:200',
			'copia_dpi' => 'required|max:200',
			'copia_oficio' => 'required|max:200',
			//'estado_idestado' => 'integer'
		]);
        $requestData = $request->all();
        if ($request->hasFile('copia_dpi')) {
            $requestData['copia_dpi'] = $request->file('copia_dpi')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('copia_oficio')) {
            $requestData['copia_oficio'] = $request->file('copia_oficio')
                ->store('uploads', 'public');
        }

        $solicitudusuario = SolicitudUsuario::findOrFail($id);
        $solicitudusuario->update($requestData);

        return redirect('solicitud-usuario')->with('flash_message', 'solicitudUsuario updated!')->with('title',$title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        SolicitudUsuario::destroy($id);

        return redirect('solicitud-usuario')->with('flash_message', 'solicitudUsuario deleted!');
    }


    public function denegarSolicitud($id)
    {

        $title = 'Denegar Solicitud de Usuario';
        $solicitudusuario = SolicitudUsuario::findOrFail($id);

        return view('portalAdministrativo.solicitud-usuario.denegarSolicitud', compact('solicitudusuario','title'));

    }

    public function sendMailDenied(Request $solicitante)
    {
        $solicitanteData = $solicitante->all();

        $emailsSolicitante = [];

        $emailsSolicitante[0] = $solicitanteData['correo_personal'];
        if($solicitanteData['correo_institucional'] != null)
        {
            $emailsSolicitante[1] = $solicitanteData['correo_institucional'];
        }
        Mail::send('portalAdministrativo.mails.solicitudDenegada',['solicitante' => $solicitante], function ($message) use ($solicitante, $emailsSolicitante) {
            $message->to($emailsSolicitante)->subject('Solicitud de Usuario en Portal Administrativo de Registro y Estadística, USAC');
        });
    }

    public function solicitudDenegada(Request $request, $id)
    {

        $this->validate($request, [
            'observaciones' => 'max:200',
        ]);
        $solicitudusuario = SolicitudUsuario::findOrFail($id);
        $solicitudusuario->update(
            ['observaciones' => $request->observaciones,'estado_idestado' => 2]
        );

        $request->request->add(['id'=> $id]);
        $request->request->add(['nombre'=> $solicitudusuario->nom_corto]);
        $request->request->add(['correo_personal'=> $solicitudusuario->correo_personal]);
        $request->request->add(['correo_institucional'=> $solicitudusuario->correo_institucional]);

        $this->sendMailDenied($request);

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 6;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Denegó solicitud de usuario: ' . $solicitudusuario->CUI . ' dependencia: '. $solicitudusuario->dependencia_iddependencia;
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-danger', 'Solicitud denegada con éxito.');
        return redirect('solicitud-usuario');
    }

    public function aceptarSolicitud($id)
    {

        $title = 'Aceptar Solicitud de Usuario';
        $solicitudusuario = SolicitudUsuario::findOrFail($id);
        $permisos = Permiso::all();
        $roles = RolAplicaciones::all();
        $unidadAcademica = facultad::select('codfac','nomfac')->orderBy('codfac')->get();
        $niveles = DB::table('nivel_academico')->select('codigo_nivel_academico','nombre')->orderBy('codigo_nivel_academico')->get();
        return view('portalAdministrativo.solicitud-usuario.aceptarSolicitud', compact('solicitudusuario','title','permisos','roles','unidadAcademica','niveles'));

    }

    public function sendMailAcepted(Request $solicitante)
    {
        $solicitanteData = $solicitante->all();

        $emailsSolicitante = [];

        $emailsSolicitante[0] = $solicitanteData['correo_personal'];
        if($solicitanteData['correo_institucional'] != null)
        {
            $emailsSolicitante[1] = $solicitanteData['correo_institucional'];
        }
        Mail::send('portalAdministrativo.mails.datosUsuario',['solicitante' => $solicitante], function ($message) use ($solicitante, $emailsSolicitante) {
            $message->to($emailsSolicitante)->subject('Solicitud de Usuario en Portal Administrativo de Registro y Estadística, USAC');
        });

    }


    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function registrarUsuario(Request $request,$id)
    {
        $this->validate($request, [
            'ua_validas' => 'required|max:20',
            'nivel_valido' => 'required|max:20',
            'fecha_desactivacion' => 'required',
            'num_aux' => 'integer|nullable',
        ]);

        // Obtener datos de la solicitud del usuario
        $user = SolicitudUsuario::findOrFail($id);
        $nuevoUsuario = new Administrativo();

        $nombreCompleto = explode(" ", $user->nombre ." ".$user->apellidos);
        $Iniciales = "";

        //Obtener las Iniciales del nombre del nuevo usuario
        foreach ($nombreCompleto as $w) {
            $Iniciales .= $w[0];
        }

        $nuevoUsuario->dependencia = $user->dependencia_iddependencia;
        $nuevoUsuario->login = $user->CUI;
        $nuevoUsuario->nombre = $user->nombre ." ".$user->apellidos;
        $nuevoUsuario->nom_corto = $user->nom_corto;
        $nuevoUsuario->iniciales = $Iniciales;
        $nuevoUsuario->pwd = str_random(8);
        $pwd =  $nuevoUsuario->pwd;
        $nuevoUsuario->puesto = $user->puesto;
        $nuevoUsuario->ua_validas = $request['ua_validas'];
        $nuevoUsuario->nivel_valido = $request['nivel_valido'];
        $nuevoUsuario->fecha_activacion = Carbon::now();
        $nuevoUsuario->fecha_desactivacion = $request['fecha_desactivacion'];
        $nuevoUsuario->mail = $user->correo_personal . ',' . $user->correo_institucional;
        $nuevoUsuario->cel = $user->telefono_cel . ',' . $user->telefono_trabajo;
        $nuevoUsuario->tipo_acceso = 0;
        $nuevoUsuario->nivel_acceso = 0;
        $nuevoUsuario->permisoPrimerIngreso = 0;
        $nuevoUsuario->permisoReingreso = 0;
        $nuevoUsuario->permisoTraslados = 0;
        $nuevoUsuario->permisoIncorporados = 0;
        $nuevoUsuario->permisoExtranjeros = 0;
        $nuevoUsuario->permisoPosgrado = 0;
        $nuevoUsuario->permisoElectores = 0;
        $nuevoUsuario->verReportes = 0;
        $nuevoUsuario->anulaProceso = 0;
        $nuevoUsuario->desbloqueaCarnet = 0;
        $nuevoUsuario->equivalencias = 0;
        $nuevoUsuario->proceso = 0;
        $nuevoUsuario->becados = 0;
        $nuevoUsuario->especificas = 0;

        if($nuevoUsuario->num_aux === null) {
            $nuevoUsuario->num_aux = 0;
        }else{
            $nuevoUsuario->num_aux = $request['num_aux'];
        }
        $nuevoUsuario->imprimirCarnet = 0;
        $nuevoUsuario->datosSensibles = 0;
        $nuevoUsuario->pwd_hash = bcrypt($nuevoUsuario->pwd);

        //guardando el nuevo usuario
       $exitoso = $nuevoUsuario->save();

       if($exitoso){
           //Actualizando el estado de la solicitud del usuario a Aceptada
           $user->update(
               ['estado_idestado' => 1]
           );

           // Obtener los permisos asignados
           $rol = $request['idrolAplicacion'];

           //Almacenar el rol del usuario, usuario y aplicación en la 'Aplicacion_Usuario'

           $aplicacionUsuario = new AplicacionUsuario();

           $aplicacionUsuario->aplicacion_codigo = 15;
           $aplicacionUsuario->usuario_dependencia = $user->dependencia_iddependencia;
           $aplicacionUsuario->usuario_login = $user->CUI;
           $aplicacionUsuario->idrolAplicacion = $rol;

           $aplicacionUsuario->save();

           //parametros para poder enviar el correo
           $request->request->add(['nombre'=> $user->nom_corto]);
           $request->request->add(['dependencia'=> $user->dependencia_iddependencia]);
           $request->request->add(['usuario'=> $user->CUI]);
           $request->request->add(['pwd'=> $pwd]);
           $request->request->add(['correo_personal'=> $user->correo_personal]);
           $request->request->add(['correo_institucional'=> $user->correo_institucional]);
           $this->sendMailAcepted($request);

           $auditoria = new UsuarioAccion();
           $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
           $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
           $auditoria->idCategoria = 5;
           $auditoria->usuario_ip = $request->ip();
           $auditoria->descripcion = 'aprobó solicitud de usuario: ' . $user->CUI . ' dependencia: '. $user->dependencia_iddependencia;
           $auditoria->fecha_accion = Carbon::now();
           $auditoria->save();

           $request->session()->flash('alert-success', 'Solicitud Aceptada con exito');
       }else{
           $errors = new MessageBag();
           $errors->add('error', 'No se pudo almacenar el nuevo usuario');
           return redirect()->back()->withInput()->withErrors($errors);
       }

       return redirect('solicitud-usuario');
    }


}
