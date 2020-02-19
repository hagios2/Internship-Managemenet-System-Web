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


        view()->composer('main_cordinator.home', function($view){

            $view->with(['default_app_count'=> \App\InternshipApplication::where('default_application', 1)->get(),
                        'default_approved_count'=> \App\Company::numberOfCompanyApplication(),
                        'proposed_app_count'=> \App\InternshipApplication::where('preferred_company', 1)->get()->count(),
                        'no_proposed_approved' => \App\OtherApplicationApproved::where('approved', 1)->get()->count()
             ]);
        });
    }
}
