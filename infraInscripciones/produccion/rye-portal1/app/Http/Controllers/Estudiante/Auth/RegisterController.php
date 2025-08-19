<?php

namespace App\Http\Controllers\Estudiante\Auth;

use App\Estudiante;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\EstudianteVerifyEmail;

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
    protected $redirectTo = '/estudiante';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('estudiante.guest:estudiante');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:estudiantes',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Estudiante
     */
    protected function create(array $data)
    {
        return Estudiante::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('estudiante.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('estudiante');
    }



    /**
    * Show the email verification message.
    *
    * @return Response
    */
    public function verify($carnet, $verification_token)
    {
        $user = Estudiante::where(['carnet'=>$carnet, 'verification_token'=>$verification_token])->first();
        if($user)
        {
            $estudiante = Estudiante::where(['carnet'=>$carnet, 'verification_token'=>$verification_token])->update(
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
            return view('estudiante.informacion',compact('titulo','mensaje','title'));
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
         return view('estudiante.emailVerification',compact('title'));
     }
 
     /**
      * Send email with verification link.
      *
      * @return Response
      */
     public function sendEmailVerification($user)
     {
         //return $user;
         //$estudiante = Estudiante::findOrFail($carnet);
         Mail::to($user['email'])->send(new EstudianteVerifyEmail($user));
     }

    /**
     * Handle an email change request for the application.
     *
     * @param Request $request
     * @return Response
     */
     public function changeEmail(Request $request)
     {
         $carnet = $request->carnet;
         $fecha = $request->fecha;
         $correo = $request->correo;
 
         $usuario = Estudiante::where(['carnet'=>$carnet, 'fec_nac'=>$fecha])->first();
         
         // verifica que la combinación carnet-fecha exista
         if($usuario)
         {            
                 $last_recovery = ($usuario->last_email_recovery == NULL ? 86401 : (time() - strtotime($usuario->last_email_recovery)));
                 //Solo se puede hacer una recuperación al día
                 //86400 segundos = 1 día
                 if($last_recovery > 86400)
                 {
                     //if($usuario->last_email_recovery == NULL || $usuario->last_email_recovery == )
                     $estudiante = Estudiante::where(['carnet'=>$carnet, 'fec_nac'=>$fecha])->update(
                         [
                             'verification_state'=>'0', 
                             'verification_token'=>Str::random(40),
                             'email'=>$correo,
                             'last_email_recovery'=> now()
                         ]
                     );
                     $usuario = Estudiante::where(['carnet'=>$carnet, 'fec_nac'=>$fecha])->first();
                     $this->sendEmailVerification($usuario);
 
                $masked = $this->maskEmail($correo);
                $title = 'Verificación de Correo Electrónico';
 
                return view('estudiante.emailVerification',compact('title','masked'));
            }
 
            $title = 'Verificación de Correo Electrónico';
            $titulo = 'Error en la recuperación';
            $mensaje = 'Únicamente se puede hacer una recuperación de correo electrónico por día.';
            return view('estudiante.informacion',compact('titulo','mensaje','title'));
         }        
 
         $title = 'Verificación de Correo Electrónico';  
         $titulo = 'Error en la recuperación';
         $mensaje = 'Los datos no concuerdan. Inténtalo de nuevo.';
         return view('estudiante.informacion',compact('titulo','mensaje','title'));
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

}
