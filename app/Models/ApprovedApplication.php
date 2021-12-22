<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovedApplication extends Model
{
    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
