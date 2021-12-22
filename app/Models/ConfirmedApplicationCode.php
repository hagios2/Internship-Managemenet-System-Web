<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmedApplicationCode extends Model
{
    protected $guarded = ['id'];


    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }


    public function application()
    {
        return $this->belongsTo('App\Models\InternshipApplication', 'application_id');
    }
}
