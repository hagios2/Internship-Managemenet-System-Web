<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([

            'department' => 'Computer and Electrical Engineering',
        ]);

        Department::create([

            'department' => 'Renewable Energy Engineering'
        ]);

        Department::create([

            'department' => 'Mechanical and Agricultural Engineering'
        ]);

        Department::create([

            'department' => 'Computer Science and I.T'
        ]);

        Department::create([

            'department' => 'Petroleum Engineering'
        ]);
    }
}
