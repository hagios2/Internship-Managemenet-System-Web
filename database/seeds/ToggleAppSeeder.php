<?php

use App\ToggleApp;

use Illuminate\Database\Seeder;

class ToggleAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ToggleApp::create(['toggle'=> false]);
    }
}
