<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherApplicationApproved extends Model
{
    protected $guarded = ['id'];

    public function otherApplication()
    {
        return $this->belongsTo('App\InternshipApplication', 'application_id');
    }

}
