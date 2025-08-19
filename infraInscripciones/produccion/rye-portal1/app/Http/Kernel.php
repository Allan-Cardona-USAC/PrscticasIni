<?php

namespace App\Http;

use App\Http\Middleware\AbcCarrera;
use App\Http\Middleware\AbcEXT;
use App\Http\Middleware\AbcUA;
use App\Http\Middleware\AdministrarUsuario;
use App\Http\Middleware\AdministrativoBecado;
use App\Http\Middleware\AdministrativoExonerado;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckForMaintenanceMode;
use App\Http\Middleware\CuentaDesactivada;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\RedirectCertInscripciones;
use App\Http\Middleware\RedirectCertInscripcionesPostgrado;
use App\Http\Middleware\RedirectExonerados;
use App\Http\Middleware\RedirectBoletas;
use App\Http\Middleware\RedirectIfAdministrativo;
use App\Http\Middleware\RedirectIfAspirante;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfEstudiante;
use App\Http\Middleware\RedirectIfNotAdministrativo;
use App\Http\Middleware\RedirectIfNotAspirante;
use App\Http\Middleware\RedirectIfNotEstudiante;
use App\Http\Middleware\RedirectCertiTitulos;
use App\Http\Middleware\RedirectEstadistica;
use App\Http\Middleware\RedirectArchivos;
use App\Http\Middleware\postDoctorado;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\TrustProxies;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Routing\Middleware\ValidateSignature;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        CheckForMaintenanceMode::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
        TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'administrativo.auth' => RedirectIfNotAdministrativo::class,
        'administrativo.guest' => RedirectIfAdministrativo::class,
        'administrativo.administrarUsuario' => AdministrarUsuario::class,
        'administrativo.abcUA' => AbcUA::class,
        'administrativo.abcEXT' => AbcEXT::class,
        'administrativo.abcCarrera' => AbcCarrera::class,
        'administrativo.becado' => AdministrativoBecado::class,
        'administrativo.exonerado' => AdministrativoExonerado::class,
        'administrativo.cuentaDesactivada' => CuentaDesactivada::class,
        'administrativo.RedirectCertiTitulos' => RedirectCertiTitulos::class,
        'administrativo.RedirectEstadistica' => RedirectEstadistica::class,
        'administrativo.RedirectArchivos' => RedirectArchivos::class,
        'estudiante.auth' => RedirectIfNotEstudiante::class,
        'estudiante.guest' => RedirectIfEstudiante::class,
        'aspirante.auth' => RedirectIfNotAspirante::class,
        'aspirante.guest' => RedirectIfAspirante::class,
        'auth' => Authenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'bindings' => SubstituteBindings::class,
        'cache.headers' => SetCacheHeaders::class,
        'can' => Authorize::class,
        'guest' => RedirectIfAuthenticated::class,
        'signed' => ValidateSignature::class,
        'throttle' => ThrottleRequests::class,
        'verified' => EnsureEmailIsVerified::class,
        'administrativo.RedirectCertInscripciones' => RedirectCertInscripciones::class,
        'administrativo.RedirectCertInscripcionesPostgrado' => RedirectCertInscripcionesPostgrado::class, 
        'administrativo.RedirectExonerados' => RedirectExonerados::class,
        'administrativo.postDoctorado' => postDoctorado::class,
        'administrativo.RedirectArchivos' => RedirectArchivos::class,
        'administrativo.RedirectBoletas' => RedirectBoletas::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        StartSession::class,
        ShareErrorsFromSession::class,
        Authenticate::class,
        AuthenticateSession::class,
        SubstituteBindings::class,
        Authorize::class,
    ];
}
