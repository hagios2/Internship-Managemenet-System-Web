<?php

namespace App\Http\Resources;
use App\InternshipApplication;

use Illuminate\Http\Resources\Json\JsonResource;

class ProposedApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $applications = InternshipApplication::findorFail($this->id);
        
        return [
        
            'id' => $applications->id,

            'student_name' => $applications->student->name,

            'preferred_company_name' => $this->preferred_company_name,

            'preferred_company_location' => $this->preferred_company_location,

            'preferred_company_city' => $applications->city->region,

            'level' =>  $applications->student->level->level,

            'program' =>  $applications->student->program->program,

        ];
    }
}
