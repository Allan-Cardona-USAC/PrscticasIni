<?php

namespace App\Http\Controllers\Aspirante\Auth;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Aspirante;
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
    protected $redirectTo = '/aspirante/inscripcion';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('aspirante.guest:aspirante', ['except' => 'logout']);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'nov';
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('aspirante');
    }

    /**
     * Show the application's login form.
     *
     * @return Response
     */
    public function showLoginForm()
    {
        $rol='aspirante';
        $title='Inicia sesión';
        //return view('aspirante.auth.login');
        return view('common.auth.login', compact('rol', 'title'));
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        //return redirect($this->redirectTo);
        return redirect('/login');
    }


    /**
     * Attempt to log the user into the application.
     *
     * @param Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        //validando el resultado de captcha    
        $gtoken = $request->rgtk_aspirante;
        $gvalido = Recaptcha::verificar($gtoken);
        $request['gvalido'] = $gvalido;

        if(!$gvalido){
            return false;
        }

        $canLogin = $this->guard()->attempt(
            [  
                'nov' => $request->nov, 
                'password' => $request->password, 
                'verification_state' => 1], 
            $request->filled('remember')
        );  

        if($canLogin)
        {   
            $aspirante = Aspirante::where(['nov'=>$request->nov])->update(
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
     * @param Request $request
     * @return RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        if(!$request->gvalido){
            $errors = ['recaptcha'=> '¿Eres un robot?, vuelve a intentarlo.'];
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors($errors);
        }
        $errors = [$this->username() => trans('auth.failed')];

        // Load user from database
        $user = Aspirante::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && Hash::check($request->password, $user->pin_hash) && $user->verification_state != 1) {
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
