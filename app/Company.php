<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id'];

    public function region()
    {
        
        return $this->belongsTo('App\Region', 'region_id');
        
    }

    public static function addCompany($company_name, $location, $total_slots)
    {
       return static::create([

            'company_name' => $company_name,

            'region_id'     => $location,

            'total_slots'  => $total_slots

        ]);
    }
}
