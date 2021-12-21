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
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
//        $this->mapApiRoutes();
//
//        $this->mapWebRoutes();
//
//        $this->mapSupervisorRoutes();
//
//        $this->mapCoordinatorRoutes();

        $this->mapMainCoordinatorRoutes();
    }

    /**
     * Define the "main_coordinator" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapMainCoordinatorRoutes()
    {
        Route::prefix('api/main-coordinator')
            ->middleware('api')
            ->namespace("{$this->namespace}\MainCoordinator")
            ->group(base_path('routes/main_coordinator.php'));
    }


    /**
     * Define the "coordinator" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
//    protected function mapCoordinatorRoutes()
//    {
//        Route::prefix('api/coordinator')
//            ->middleware('api')
//            ->namespace($this->namespace)
//            ->group(base_path('routes/coordinator.php'));
//    }

    /**
     * Define the "supervisor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
//    protected function mapSupervisorRoutes()
//    {
//        Route::prefix('api/supervisor')
//            ->middleware('api')
//            ->namespace($this->namespace)
//            ->group(base_path('routes/supervisor.php'));
//    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
//    protected function mapWebRoutes()
//    {
//        Route::middleware('web')
//             ->namespace($this->namespace)
//             ->group(base_path('routes/web.php'));
//    }

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
