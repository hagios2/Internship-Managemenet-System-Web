<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = ['id'];


    public function program()
    {
        return $this->hasMany('App\Program');
    }
}
