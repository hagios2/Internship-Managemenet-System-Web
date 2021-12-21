<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['student.edit_application', 'student.application_form', 'main_cordinator.companies.company', 'cordinator.home' ],
             'App\Http\View\Composers\CompanyComposer');

        view()->composer(['cordinator.home'],
             'App\Http\View\Composers\DepartmentComposer');


        view()->composer(['student.edit_application', 'student.application_form', 'main_cordinator.companies.company', 'main_cordinator.companies.create_company', 'main_cordinator.companies.edit_company', 'main_cordinator.companies.view_company', 'cordinator.home' ], 'App\Http\View\Composers\RegionComposer');


        view()->composer(['main_cordinator.home', 'student.application_form', 'student.edit_application', 'student.intern', 'stu.index'],'App\Http\View\Composers\ToggleAppComposer');
         
    }
}
