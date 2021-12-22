<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validate)
 */
class Company extends Model
{
    protected $guarded = ['id'];

    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'city');
    }

    public function application()
    {
        return $this->hasMany('App\Models\InternshipApplication');
    }

    public function approved_application()
    {
        return $this->hasOne('App\Models\ApprovedApplication');
    }

    public function appointment()
    {
        return $this->hasOne('App\Models\Appointment');
    }

    public function confirmedAppCode()
    {
        return $this->hasOne('App\Models\ConfirmedApplicationCode');
    }

    public function addConfirmApplicationCode($code)
    {
        return $this->confirmedAppCode()->create(['code' => $code]);
    }


    public function addApplicationApproval()
    {
        return $this->approved_application()->create(['approved' => true])->id;
    }


    public function addAppointment($appointment_data)
    {
        $this->appointment()->create($appointment_data);
    }

    public static function numberOfCompanyApplication()
    {
        $companies = static::all();

        static $number_company_application = 0;

        foreach ($companies as $company) {
            if ($company->application && $company->approved_application) {
                $number_company_application += $company->application->count();
            }
        }

        return $number_company_application;
    }
}
