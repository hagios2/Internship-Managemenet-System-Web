<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'index_no', 'program_id', 'level_id', 'device_token', 'phone'
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

    public function studentNotification()
    {
        return $this->hasOne('App\Models\StudentNotification');
    }


    public function assessment()
    {
        return $this->hasOne('App\Models\Assessment', 'student_id');
    }


    public function addNotification($notification)
    {
        $this->studentNotification()->create($notification);
    }


    public function registerStudent($attributes)
    {
        $this->application()->create($attributes);
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    public function program()
    {
        return $this->belongsTo('App\Models\Program');
    }

    public function approveSchedule()
    {
    }

    public function application()
    {
        return $this->hasOne('App\Models\InternshipApplication', 'student_id');
    }

    public function intern()
    {
        return $this->hasMany(Intern::class);
    }

    public function addRequestSupervisorApproval($coords)
    {
        $this->intern()->create([
            'off_premises' => true,
            'check_in_timestamp' => now(),
            'latitude' => $coords['latitude'],
            'longitude' => $coords['longitude'],
        ]);
    }

    public function addInternsAttendance($coords)
    {
        $this->intern()->create([
            'on_premises' => true,
            'check_in_timestamp' => now(),
            'latitude' => $coords['latitude'],
            'longitude' => $coords['longitude'],
        ]);
    }

    public function message()
    {
        return $this->hasMany('App\Models\Message');
    }


    public function addMessage($message)
    {
        return $this->message()->create($message);
    }

    public function AauthAcessToken()
    {
        return $this->hasMany('\App\Models\OauthAccessToken');
    }


    public function approvedAppointment()
    {
        return $this->hasOne('App\Models\AppointmentNoted', 'student_id');
    }
}
