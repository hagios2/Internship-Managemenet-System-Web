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
        'name', 'email', 'password', 'index_no', 'program_id'
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

    public function applying_student()
    {
        return $this->hasOne('App\StudentsRegion', 'student_id');
    }


    public function registerStudent($attributes)
    {
        
        $this->applying_student()->create([

       /*      'student_id' => auth()->id(), */

            'first_region' => $attributes['first_location'] ?? null,

            'second_region' => $attributes['second_location'] ??null,

            'proposed_company' => $attributes['proposed_company']  ?? null,

            'company_location' => $attributes['company_location'] ??null
        ]);
    }
   
}
