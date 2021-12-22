<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $quarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}