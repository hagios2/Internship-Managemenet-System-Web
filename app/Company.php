<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id'];

    public function region()
    {
        
        return $this->belongsTo('App\Region', 'city');
        
    }

    public function application()
    {
        return $this->hasMany('App\InternshipApplication');
    }

}
