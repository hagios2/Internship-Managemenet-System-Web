<?php

namespace App\Http\Resources;

use App\MainCordinator;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $main_cordinator = MainCordinator::find(1);

        return [

            'from_student' => $this->from_student,
            'from_main_cordinator' => $this->from_main_courdinator,
            'main_cord_name' => $main_cordinator->name,
            'message' => $this->message,
            'read_at' => $this->read_at

        ];

    }
}
