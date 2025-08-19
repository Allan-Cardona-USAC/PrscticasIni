<?php

namespace App\Http\Controllers\Administrativo\Auth;

use App\Administrativo;
use App\Funciones\Recaptcha;
use App\Http\Controllers\Controller;
use App\Models\UsuarioAccion;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/administrativo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.guest:administrativo', ['except' => 'logout']);
    }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'login';
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('administrativo');
    }

    /**
     * Show the application's login form.
     *
     * @return Response
     */
    public function showLoginForm()
    {
        //return view('administrativo.auth.login');
        $rol='administrativo';
        $title='Inicia sesión';
        return view('common.auth.login', compact('rol', 'title'));
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
     * Get the needed authorization credentials from the request.
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(),'dependencia', 'password');
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        #se obtiene el usuario con la sesión iniciada
        $usuarioActual = Administrativo::where('dependencia',Auth::guard('administrativo')->user()->dependencia)
            ->where('login',Auth::guard('administrativo')->user()->login)->firstOrFail();

        $ultima_sesion = Carbon::now();
        $usuarioActual->ultima_sesion = $ultima_sesion;

        $usuarioActual->save();

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 7;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'Inicio sesión';
        $auditoria->fecha_accion = $ultima_sesion;
        $auditoria->save();
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

        return redirect($this->redirectTo);
    }

    protected function attemptLogin(Request $request)
    {
        //validando el resultado de captcha
        $gtoken = $request->rgtk_admin;
        $gvalido = Recaptcha::verificar($gtoken);
        $request['gvalido'] = $gvalido;

        if(!$gvalido){
            return false;
        }

        $canLogin = $this->guard()->attempt(
            [
                'login' => $request->login,
                'password' => $request->password,
                'dependencia' => $request->dependencia
            ],
            $request->filled('remember')
        );

        return $canLogin;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        if(!$request->gvalido){
            $errors= ['recaptcha_a' => '¿Eres un robot?, vuelve a intentarlo.'] ;
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors($errors);
        }

        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()){
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

}