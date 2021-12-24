<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded = ['id'];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function student()
    {
        return $this->hasMany('App\Models\User');
    }
}
