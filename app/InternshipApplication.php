<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Region', 'preferred_company_city');
    }

    public function company()
    {
        
        return $this->belongsTo('App\Company');
        
    }
}
