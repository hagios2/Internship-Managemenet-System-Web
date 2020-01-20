<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(ToggleAppSeeder::class);
        $this->call(CompanysTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
    }
}
