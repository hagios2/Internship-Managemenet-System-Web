<?php

use Illuminate\Database\Seeder;
use App\MainCordinator;

class MainCordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainCordinator::create([
            'name' => 'Emmanuel Oteng Wilson',
            'password' => 'password',
            'email' => 'hagioswilson@gmail.com'
        ]);
    }
}
