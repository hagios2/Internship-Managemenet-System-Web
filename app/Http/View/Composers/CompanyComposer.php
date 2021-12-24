<?php

namespace App\Http\View\Composers;

use App\Models\Company;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class CompanyComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $companies;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Company $companies)
    {
        // Dependencies automatically resolved by service container...
        $this->companies = $companies;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('companies', $this->companies->all());
    }
}
