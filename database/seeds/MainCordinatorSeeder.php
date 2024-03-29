<?php

use App\Models\MainCordinator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('password'),
            'email' => 'hagioswilson@gmail.com'
        ]);
    }
}
