<?php

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([

            'department_id' => 1,

            'program' => 'Computer Engineering',
        ]);

        Program::create([

            'department_id' => 1,

            'program' => 'Electrical and Electronics Engineering',
        ]);

        Program::create([

            'department_id' => 2,

            'program' => 'Renewable Energy Engineering',
        ]);

        Program::create([

            'department_id' => 3,

            'program' => 'Agricultural Engineering',
        ]);

        Program::create([

            'department_id' => 3,

            'program' => 'Mechanical Engineering',
        ]);

        Program::create([

            'department_id' => 4,

            'program' => 'Computer Science',
        ]);

        Program::create([

            'department_id' => 4,

            'program' => 'Information Technology',
        ]);
    }
}
