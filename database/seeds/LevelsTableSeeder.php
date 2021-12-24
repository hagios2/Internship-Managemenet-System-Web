<?php

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create(['level' => 'Level 100']);

        Level::create(['level' => 'Level 200']);

        Level::create(['level' => 'Level 300']);

        Level::create(['level' => 'Level 400']);
    }
}
