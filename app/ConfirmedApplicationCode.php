<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmedApplicationCode extends Model
{
    protected $guarded = ['id'];


    public function company()
    {
        return $this->belongsTo('App\Company');
    }


    public function application()
    {
        return $this->belongsTo('App\InternshipApplication');
    }
}
