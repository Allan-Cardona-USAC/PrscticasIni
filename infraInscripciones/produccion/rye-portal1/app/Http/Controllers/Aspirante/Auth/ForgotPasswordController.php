<?php

namespace App\Http\Controllers\Aspirante\Auth;

use App\Aspirante;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\AspiranteVerifyEmail;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        $title = 'Recuperar contraseña';
        return view('aspirante.auth.passwords.email', compact('title'));
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // ----------------------------
        $nov = $request->nov;
        $fecha = $request->fecha;
        $correo = $request->correo;

        $usuario = Aspirante::where(['nov'=>$nov, 'fecha_nacimiento'=>$fecha])->first();
        if($usuario)
        {
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

       $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('nov')
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);

        }else{
                $title = 'Verificación de Correo Electrónico';
                $titulo = 'Error en la recuperación';
                $mensaje = 'Los datos no concuerdan. Inténtalo de nuevo.';

        return view('aspirante.informacion',compact('titulo','mensaje','title'));
        }


    }

 public function sendEmailVerification($user)
    {
        Mail::to($user['correo_electronico'])->send(new AspiranteVerifyEmail($user));
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



    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['nov' => 'required|string']);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
                ->withInput($request->only('nov'))
                ->withErrors(['nov' => trans($response)]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('aspirantes');
    }

}
