<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $validate)
 */
class Company extends Model
{
    public const DEFAULT_COMPANY = 'default';

    public const STUDENT_COMPANY = 'student_company';

    protected $guarded = ['id'];

    public function region(): BelongsTo
    {
        return $this->belongsTo('App\Models\Region', 'city');
    }

    public function application(): HasMany
    {
        return $this->hasMany('App\Models\InternshipApplication');
    }

    public function approved_application(): HasOne
    {
        return $this->hasOne('App\Models\ApprovedApplication');
    }

    public function appointment(): HasOne
    {
        return $this->hasOne('App\Models\Appointment');
    }

    public function confirmedAppCode(): HasOne
    {
        return $this->hasOne('App\Models\ConfirmedApplicationCode');
    }

    public function addConfirmApplicationCode($code): Model
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

    public static function numberOfCompanyApplication(): int
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
