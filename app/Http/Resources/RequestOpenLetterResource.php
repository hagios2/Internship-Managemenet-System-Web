<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\InternshipApplication;

class RequestOpenLetterResource extends JsonResource
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

            'student_name' => $applications->student->name,

            'level' =>  $applications->student->level->level,

            'program' =>  $applications->student->program->program,

            'phone' => $this->phone 

        ];
    }
}
