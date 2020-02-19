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

            'city' => '1',

            'email' => 'gtl@info.com',

            'lat' => '5.603716800000001',

            'long' => '-0.18696439999996528'

        ]);


        Company::create([

            'company_name' => 'Metro Tv',

            'total_slots' => '6',

            'location' => 'Labone',

            'city' => '2',

            'email' => 'metro.p@info.com',

            'lat' => '5.603716800000001',

            'long' => '-0.18696439999996528'

        ]);



        Company::create([

            'company_name' => 'QodeLyn',

            'total_slots' => '3',

            'location' => 'Anaji',

            'city' => '1',

            'email' => 'qodelyn@uenr.edu.gh',

            'lat' => '5.603716800000001',

            'long' => '-0.18696439999996528'

        ]);


        Company::create([

            'company_name' => 'Mindsumo',

            'total_slots' => '10',

            'location' => 'East Legon',

            'city' => '5',

            'email' => 'crowdsource.ms@info.com',

            'lat' => '5.603716800000001',

            'long' => '-0.18696439999996528'

        ]);
    }
}
