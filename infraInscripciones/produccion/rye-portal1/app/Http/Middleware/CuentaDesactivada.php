<?php


namespace App\Http\Middleware;


use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuentaDesactivada
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
        if(!(Auth::guard('administrativo')->user()->fecha_desactivacion > Carbon::now() || Auth::guard('administrativo')->user()->fecha_desactivacion === '0000-00-00')) {

            return redirect(route('administrativo.cuentaDesactivada'));
        }

        return $next($request);
    }
}
