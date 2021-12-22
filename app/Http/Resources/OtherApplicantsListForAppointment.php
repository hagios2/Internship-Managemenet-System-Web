<?php

namespace App\Http\Resources;

use App\Models\InternshipApplication;
use Illuminate\Http\Resources\Json\JsonResource;

class OtherApplicantsListForAppointment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $application = InternshipApplication::find($this->id);

        return [

            'id' => $this->id,

            'student_name' => $application->student->name,

            'student_avatar' => $application->student->avatar,

            'company_name' => $this->preferred_company_name,

            'company_location' => $this->preferred_company_location,

            'appointment' => ($application->appointment) ? true : false,

        ];
    }
}
