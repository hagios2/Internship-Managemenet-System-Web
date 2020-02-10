<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Resource::withoutWrapping();

        view()->composer('auth.register', function($view){

            $view->with('programs', \App\Program::all());
        });

        view()->composer('auth.register', function($view){

            $view->with('levels', \App\Level::all());
        });

    }
}
