<?php

use App\Models\Region;
use Illuminate\Database\Seeder;


class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([

            'region' => 'Western'
        ]);

        Region::create([

            'region' => 'Greater Accra'
        ]);
    

        Region::create([

            'region' => 'Eastern'
        ]);

        Region::create([

            'region' => 'Central'
        ]);

        Region::create([

            'region' => 'Brong Ahafo'
        ]);

        Region::create([

            'region' => 'Volta'
        ]);

        Region::create([

            'region' => 'Ashanti'
        ]);

        Region::create([

            'region' => 'Upper West'
        ]);

        Region::create([

            'region' => 'Upper East'
        ]);

        Region::create([

            'region' => 'Northern'
        ]);
    }
}
