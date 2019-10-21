<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected guarded = ['id'];

    public static function addCompany($company_name, $location, $total_slots)
    {
        static::create([

            'company_name' => $company_name,

            'location'     => $location,

            'total_slots'  => $total_slots

        ]);
    }
}
