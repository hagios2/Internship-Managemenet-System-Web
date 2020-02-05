<?php

namespace App\Http\Resources;
use App\InternshipApplication;
use App\User;

//use App\

use Illuminate\Http\Resources\Json\JsonResource;

class StudentDataAndApplication extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $id =  $this->id;

        $student = User::findOrFail($id);

        $application = $student->application;

        //$attendance = $student->attendance
        if($application)
        {

            if($application->default_application)
            {
                $company = $application->company->company_name;

                $location = $application->company->location;

                $region = $application->company->region->region;
            
            }else if($application->preferred_company)
            {

                $company = $application->preferred_company_name;

                $location = $application->preferred_company_location;

                $region = $application->city->region;

            }
        }

       return [

        'id' => $this->id,

        'name' => $this->name,

        'index_no' => $this->index_no,

        'avatar' => $this->avatar,

        #return null if application was an open letter application

        'company' => $company ?? null,

        'location' => $location ?? null,

        'region' => $region ?? null

       ];
        
    }
}
