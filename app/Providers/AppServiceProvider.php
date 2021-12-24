<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\ServiceProvider;

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

        view()->composer(['auth.register', 'stu.profile'], function ($view) {
            $view->with('programs', \App\Models\Program::all());
        });

        view()->composer(['auth.register', 'stu.profile'], function ($view) {
            $view->with('levels', \App\Models\Level::all());
        });


        view()->composer('vendor.adminlte.cordinator_register', function ($view) {
            $view->with('departments', \App\Models\Department::all());
        });


        view()->composer('layouts.app', function ($view) {
            $view->with('notification', \App\Models\StudentNotification::numberAlert());
        });


        view()->composer('main_cordinator.home', function ($view) {
            $view->with(['default_app_count'=> \App\Models\InternshipApplication::where('default_application', 1)->get(),
                        'default_approved_count'=> \App\Models\Company::numberOfCompanyApplication(),
                        'proposed_app_count'=> \App\Models\InternshipApplication::where('preferred_company', 1)->get()->count(),
                        'no_proposed_approved' => \App\Models\OtherApplicationApproved::where('approved', 1)->get()->count()
             ]);
        });
    }
}
