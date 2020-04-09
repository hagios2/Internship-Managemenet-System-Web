<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function application()
    {
        return $this->belongsTo('App\InternshipApplication');
    }

    public function student()
    {
        return $this->belongsTo('App\User');
    }

    public function main_cordinator()
    {
        return $this->belongsTo('App\MainCordinator');
    }
}
