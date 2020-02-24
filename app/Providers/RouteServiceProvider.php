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

        $this->mapSupervisorRoutes();

        $this->mapCordinatorRoutes();

        $this->mapMainCordinatorRoutes();

        //
    }

    /**
     * Define the "main_cordinator" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapMainCordinatorRoutes()
    {
        Route::group([
            'middleware' => ['web', 'main_cordinator', 'auth:main_cordinator'],
            'prefix' => 'main-cordinator',
            'as' => 'main-cordinator.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/main_cordinator.php');
        });
    }


    /**
     * Define the "cordinator" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapCordinatorRoutes()
    {
        Route::group([
            'middleware' => ['web', 'cordinator', 'auth:cordinator'],
            'prefix' => 'cordinator',
            'as' => 'cordinator.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/cordinator.php');
        });
    }

    /**
     * Define the "supervisor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSupervisorRoutes()
    {
        Route::group([
            'middleware' => ['web', 'supervisor', 'auth:supervisor'],
            'prefix' => 'supervisor',
            'as' => 'supervisor.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/supervisor.php');
        });
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
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
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
