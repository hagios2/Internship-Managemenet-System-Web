<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\ToggleApp;

class ToggleAppComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
  /*   protected $toggleApp;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
   /*  public function __construct(ToggleApp $toggleApp)
    {
        // Dependencies automatically resolved by service container...
        $this->$toggleApp = $toggleApp;
    } */
 
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('toggleapp', ToggleApp::find(1)); 
    }
}