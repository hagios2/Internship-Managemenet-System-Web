<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Department;

class DepartmentComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $departments;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Department $departments)
    {
        // Dependencies automatically resolved by service container...
        $this->departments = $departments;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('departments', $this->departments->all());
    }
}