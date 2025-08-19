<?php

namespace App\Http\Controllers\Estudiante\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Estudiante;
use App\Funciones\Recaptcha;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('estudiante.guest:estudiante', ['except' => 'logout']);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'carnet';
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('estudiante');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        //return view('estudiante.auth.login');
        $rol='estudiante';
        $title='Inicia sesión';
        return view('common.auth.login', compact('rol', 'title'));
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($this->redirectTo);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        //validando el resultado de captcha
        $gtoken = $request->rgtk_estudiante;
        $gvalido = Recaptcha::verificar($gtoken);
        $request['gvalido'] = $gvalido;

        if(!$gvalido){
            return false;
        }

        $canLogin = $this->guard()->attempt(
            [
                'carnet' => $request->carnet, 
                'password' => $request->password, 
                'verification_state' => 1], 
            $request->filled('remember')
        );

        if($canLogin)
        {
            $estudiante = Estudiante::where(['carnet'=>$request->carnet])
                ->update(
                    [
                        'last_login'=>now()
                    ]
                );
        }

        return $canLogin;
    }
 
    /**
    * Get the failed login response instance.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\RedirectResponse
    */
    protected function sendFailedLoginResponse(Request $request)
    {
        if(!$request->gvalido){
            $errors= ['recaptcha_e' => '¿Eres un robot?, vuelve a intentarlo.'] ;
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors($errors);
        }

        $errors = [$this->username() => trans('auth.failed')];
       
        // Load user from database
        $user = Estudiante::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && \Hash::check($request->password, $user->pin_hash) && $user->verification_state != 1) {
            $errors = [$this->username() => trans('auth.notactivated')];
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}