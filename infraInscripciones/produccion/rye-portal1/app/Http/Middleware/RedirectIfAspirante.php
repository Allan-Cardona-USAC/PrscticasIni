<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAspirante
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'aspirante')
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('aspirante.fase1');
        }

        return $next($request);
    }

}
