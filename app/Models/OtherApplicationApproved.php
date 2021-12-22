<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherApplicationApproved extends Model
{
    protected $guarded = ['id'];

    public function otherApplication()
    {
        return $this->belongsTo('App\Models\InternshipApplication', 'application_id');
    }
}
