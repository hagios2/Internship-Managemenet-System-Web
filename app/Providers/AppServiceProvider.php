<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\JsonResource;

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
        JsonResource::withoutWrapping();

        view()->composer(['auth.register', 'stu.profile'], function($view){

            $view->with('programs', \App\Program::all());
        });

        view()->composer(['auth.register', 'stu.profile'], function($view){

            $view->with('levels', \App\Level::all());
        });


        view()->composer('vendor.adminlte.cordinator_register', function($view){

            $view->with('departments', \App\Department::all());
        });


        view()->composer('layouts.app', function($view){

            $view->with('notification', \App\StudentNotification::numberAlert());
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
