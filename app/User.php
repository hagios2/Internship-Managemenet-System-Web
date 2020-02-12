<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'index_no', 'program_id', 'level_id', 'device_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

/*     public function applying_student()
    {
        return $this->hasOne('App\InternshipApplication', 'student_id');
    } */


    public function registerStudent($attributes)
    {
        
        $this->application()->create($attributes);
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }
   
    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function approveSchedule()
    {
        
    }

    public function application()
    {
        return $this->hasOne('App\InternshipApplication', 'student_id');
    }

    public function intern()
    {
        return $this->hasMany(Intern::class);
    }
}
