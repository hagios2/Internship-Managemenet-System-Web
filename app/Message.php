<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $guarded = ['id'];

    protected $dates = ['read_at'];

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

    public function scopeGetStudentMessage($query)
    {
        return $this->where([['user_id', auth()->id(), ['from_main_cordinator', true], ['read_at', null]]])->get();
    }


    public function scopeCountStudentMessage($query)
    {
        return $this->where([['user_id', auth()->id(), ['from_main_cordinator', true], ['read_at', null]]])->count();
    }

    public function scopeStudentsAllMessages($query)
    {
        return $this->where('user_id', auth()->id())->get();/* orderBy('message, desc') */ //* paginate(5); */
    }
}
