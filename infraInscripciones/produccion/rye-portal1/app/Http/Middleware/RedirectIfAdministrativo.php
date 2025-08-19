<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdministrativo
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
        if (Auth::guard($guard)->check()) {

            return redirect()->route('administrativo.dashboard');
        }

        return $next($request);
    }

}
