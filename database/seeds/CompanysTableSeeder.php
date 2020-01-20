<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompanysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([

            'company_name' => 'Ghana Tech Lab',

            'total_slots' => '3',

            'location' => 'Osu',

            'city' => '1'

        ]);


        Company::create([

            'company_name' => 'Metro Tv',

            'total_slots' => '6',

            'location' => 'Labone',

            'city' => '2'

        ]);



        Company::create([

            'company_name' => 'QodeLyn',

            'total_slots' => '3',

            'location' => 'Anaji',

            'city' => '1'

        ]);


        Company::create([

            'company_name' => 'Mindsumo',

            'total_slots' => '10',

            'location' => 'East Legon',

            'city' => '5'

        ]);
    }
}
