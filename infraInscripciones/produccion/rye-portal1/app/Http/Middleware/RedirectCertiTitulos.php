<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectCertiTitulos
{

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @param  string|null  $guard
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = 'administrativo')
    {
        if(!in_array(47,Auth::guard('administrativo')->user()->getPermisosUsuario()->pluck('permiso_idpermiso')->toArray())) {

            return redirect()->route('administrativo.accesoRestringido');
        }

        return $next($request);
    }

}
