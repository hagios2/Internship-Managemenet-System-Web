<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded = ['id'];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function student()
    {
        return $this->hasMany('App\User');
    }
}
