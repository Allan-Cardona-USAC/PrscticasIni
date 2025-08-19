<?php

namespace App\Http\Controllers\Aspirante\Auth;

use App\Aspirante;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use App\Mail\AspiranteVerifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new admins as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/aspirante';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('aspirante.guest:aspirante');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nov' => 'required|max:255',
            'correo' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Aspirante
     */
    protected function create(array $data)
    {
    /*    return Aspirante::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    */
    /*    return Aspirante::updateOrCreate(
            [
                'nov' => $data['nov']
            ],
            [
                'correo' => $data['nov'],
                'pin_hash' => bcrypt($data['password'])
            ]
        );
    */
        $aspirante = Aspirante::find($data['nov']);
        if(!$aspirante)
        {
            return null;
        }
       /* else if($aspirante->pin_hash != null)
        {
            return null;
        }
        $aspirante->pin_hash = bcrypt($data['password']);
        $aspirante->correo = $data['correo'];
        $aspirante->save();*/
        return $aspirante;
    }

    /**
     * Crea una instancia de Aspirante (informacion_aspirante),
     * si la información del aspirante se encuentra en la tabla aspirantes
     *
     * @param array $data
     * @return Aspirante
     */
    protected function createInformacionAspirante(array $data)
    {
        // buscar en aspirante si el NOV existe
        // si el nov existe
            // verificar en informacion_aspirante si tiene correo
                // si tiene correo
                    // error usuario ya registrado
                // si no tiene correo
                    // traer datos de aspirante
                    // e insertarlos en informacion_aspirante

        // si el nov no existe
            // error NOV no registrado en base de datos


        // return null -> usuario no se encuentra en base de datos
        // return obj -> fila de tabla aspirante

        // busca registro en aspirantes
        $user = DB::table('aspirantes')
                ->where('nov', $data['nov'])
                ->where('fecha_nacimiento', $data['fecha'])
                ->first();
        if ($user)
        {
            // busca registro en informacion_aspirante
            //$aspirante = Aspirante::find($data['nov']);

            //$aspirante = DB::table('informacion_aspirante')->where('nov', $data['nov'])->first();

            // registro no existe en informacion_aspirante
            // se debe crear el registro
            //if(!$aspirante)
            //{

                /*
                *   VERIFICAR SI EL USUARIO EXISTE
                *   EN INFORMACIÓN_ASPIRANTE
                */


                $usuario = Aspirante::firstOrNew(
                    ['nov' => $data['nov']],
                    [
                        //'nov' => $data['nov'],
                        'apellido1' => $user->apellido1,
                        'apellido2' => $user->apellido2,
                        'nombre1' => $user->nombre1,
                        'nombre2' => $user->nombre2,
                        'direccion' => $user->direccion,
                        'telefono' => $user->telefono,
                        'celular' => $user->celular,
                        'fecha_nacimiento' => $user->fecha_nacimiento,
                        'sexo' => $user->sexo,
                        'estado_civil' => 0,
                        'numero_pasaporte' => '',
                        'nit' => '',
                        'confirmado' => 0,
                        'pais_extendida' => 0,
                        'depto_extendida' => 0,
                        'muni_extendida'  => 0,
                        'proveedor_cel' => '',
                        'verification_token' => Str::random(40),
                        'correo_electronico' => $data['correo'],
                        'pin_hash' => bcrypt($data['password']),
                        'pin' => $user->pin,
                    ]
                );
                $usuario->save();
                return Aspirante::findOrFail($data['nov']);
            //}
            // si el registro existe solo se retorna
            // se asume que si el registro existe,
            // toda la información necesaria de la tabla
            // aspirantes ya se encuentra en la tabla
            // informacion_aspirante

            //return $aspirante;
        }
        return null;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        //$user = $this->create($request->all());
        $user = $this->createInformacionAspirante($request->all());

        // si el nov no se encuentra en la base de datos
        if(!$user)
        {
            $errors = new MessageBag();
            $errors->add('usuario', 'NOV no registrado en nuestra base de datos.');
            return redirect()->back()->withInput()->withErrors($errors);
        }
        else if($user->verification_state == 1)
        {
            $errors = new MessageBag();
            $errors->add('usuario', 'Su usuario ya fue activado previamente.');
            return redirect()->back()->withInput()->withErrors($errors);
        }


        /*
        *   else if($user->last_login != NULL)
        *   {
        *       //REGRESARLO AL LOGIN Y DECIRLE
        *       //QUE NO INTENTE REGISTRARSE OTRA VEZ
        *       //DAR LA OPCION DE RESETEAR SU CORREO
        *   }
        *
        */



        event(new Registered($user));

        //quito el login y lo envío a verificar su correo
        //$this->guard()->login($user);
        $this->sendEmailVerification($user);
        $errors = new MessageBag();
        $errors->add('usuario', trans('auth.notactivated'));

        return redirect('/aspirante/login')
            ->withInput($request->only('nov', 'remember'))
            ->withErrors($errors);

        //return redirect(route('aspirante.emailVerification'));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Show the email verification message.
     *
     * @return Response
     */
    public function verify($nov, $verification_token)
    {
        $user = Aspirante::where(['nov'=>$nov, 'verification_token'=>$verification_token])->first();
        if($user)
        {
            $aspirante = Aspirante::where(['nov'=>$nov, 'verification_token'=>$verification_token])->update(
                [
                    'verification_state'=>'1',
                    'verification_token'=>NULL,
                    'email_verified_at'=>now()
                ]
            );

            //$this->guard()->login($user);
            //return redirect($this->redirectPath());

            $title = 'Verificación de Correo Electrónico';
            $titulo = 'Verificación exitosa';
            $mensaje = 'Tu correo electrónico ha sido verificado con éxito.';
            return view('aspirante.informacion',compact('titulo','mensaje','title'));
        }
        else
        {
            return 'no encontrado :(';
        }
    }


    /**
     * Show the email verification message.
     *
     * @return Response
     */
    public function emailVerification()
    {
        $title = 'Verificación de Correo Electrónico';
        return view('aspirante.emailVerification',compact('title'));
    }

    /**
     * Send email with verification link.
     *
     * @return Response
     */
    public function sendEmailVerification($user)
    {
        //return $user;
        //$aspirante = Aspirante::findOrFail($nov);
        Mail::to($user['correo_electronico'])->send(new AspiranteVerifyEmail($user));
    }

    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function showRegistrationForm()
    {
        $title = 'Registro';
        return view('aspirante.auth.register',compact('title'));
    }


    /**
     * Handle an email change request for the application.
     *
     * @param Request $request
     * @return Response
     */
    public function changeEmail(Request $request)
    {
        $nov = $request->nov;
        $fecha = $request->fecha;
        $nombre = strtoupper($request->nombre);
        $correo = $request->correo;

        $usuario = Aspirante::where(['nov'=>$nov, 'fecha_nacimiento'=>$fecha])->first();

        // verifica que la combinación nov-fecha exista
        if($usuario)
        {
            if($this->validateName($usuario, $nombre))
            {
                $last_recovery = ($usuario->last_email_recovery == NULL ? 86401 : (time() - strtotime($usuario->last_email_recovery)));
                //Solo se puede hacer una recuperación al día
                //86400 segundos = 1 día
                if($last_recovery > 86400)
                {
                    //if($usuario->last_email_recovery == NULL || $usuario->last_email_recovery == )
                    $aspirante = Aspirante::where(['nov'=>$nov, 'fecha_nacimiento'=>$fecha])->update(
                        [
                            'verification_state'=>'0',
                            'verification_token'=>Str::random(40),
                            'correo_electronico'=>$correo,
                            'last_email_recovery'=> now()
                        ]
                    );
                    $usuario = Aspirante::where(['nov'=>$nov, 'fecha_nacimiento'=>$fecha])->first();
                    $this->sendEmailVerification($usuario);

                    $masked = $this->maskEmail($correo);
                    $title = 'Verificación de Correo Electrónico';

                    return view('aspirante.emailVerification',compact('title','masked'));
                }

                $title = 'Verificación de Correo Electrónico';
                $titulo = 'Error en la recuperación';
                $mensaje = 'Únicamente se puede hacer una recuperación de correo electrónico por día.';
                return view('aspirante.informacion',compact('titulo','mensaje','title'));
            }
        }

        $title = 'Verificación de Correo Electrónico';
        $titulo = 'Error en la recuperación';
        $mensaje = 'Los datos no concuerdan. Inténtalo de nuevo.';
        return view('aspirante.informacion',compact('titulo','mensaje','title'));
    }

    public function maskEmail($correo)
    {
        $size = strlen($correo);
        $arroba = strpos($correo, '@');
        for ($n=$arroba-2; $n>2; $n--) {
            $correo = substr_replace($correo, '*', $n, 1);
        }
        return $correo;
    }

    public function validateName(Aspirante $usuario, $entrada)
    {
        $nombre = $usuario->nombre1;

        if ($usuario->nombre2){
            $nombre .=  " " . $usuario->nombre2;
        }
        if ($usuario->otros_nombres){
            $nombre .=  " " . $usuario->otros_nombres;
        }
        $nombre .= " " . $usuario->apellido1 . " " . $usuario->apellido2;

        return strtoupper($nombre) == $entrada;
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('aspirante');
    }

}
