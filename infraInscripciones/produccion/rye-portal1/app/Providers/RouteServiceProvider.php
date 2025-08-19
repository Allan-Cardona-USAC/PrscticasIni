<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdministrativoRoutes();

        $this->mapEstudianteRoutes();

        $this->mapAspiranteRoutes();

        //
    }    
    
    /**
     * Define the "aspirante" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAspiranteRoutes()
    {
        Route::prefix('aspirante')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/aspirante.php'));
    }    
    
    /**
     * Define the "estudiante" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapEstudianteRoutes()
    {
        Route::prefix('estudiante')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/estudiante.php'));
    }

    /**
     * Define the "administrativo" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdministrativoRoutes()
    {
        Route::prefix('administrativo')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/administrativo.php'));
    }







    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
           require base_path('routes/web.php');
           require base_path('routes/portalEstudiantil/administrativo.php');
           require base_path('routes/portalAdministrativo/cruds.php');
           require base_path('routes/portalEstudiantil/rutasCMS.php');
           require base_path('routes/portalEstudiantil/reinscripcion.php');
           require base_path('routes/portalEstudiantil/inscripcion.php');
        });
        /*Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));*/
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
