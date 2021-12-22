<?php

namespace App\Http\View\Composers;

use App\Models\Region;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class RegionComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $region;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Region $region)
    {
        // Dependencies automatically resolved by service container...
        $this->region = $region;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('regions', $this->region->all());
    }
}