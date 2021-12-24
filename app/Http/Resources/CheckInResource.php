<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckInResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = User::find($this->user_id);

        $application = $user->application;

        if ($application->default_application):

            return [

                'checkin_id' => $this->id,

                'application_id' => $application->id,

                'name_student' => $user->name,

                'date' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_in_timestamp)->format('Y-m-d'),

                'time' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_in_timestamp)->format('H:i:s'),

                'lat' => $this->latitude,

                'long' => $this->longitude,

                'avatar' => $user->avatar,

            ]; else:

            return [

                'checkin_id' => $this->id,

                'application_id' => $application->id,

                'name_student' => $user->name,

                'date' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_in_timestamp)->format('Y-m-d'),

                'time' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_in_timestamp)->format('H:i:s'),

                'lat' => $this->latitude,

                'long' => $this->longitude,

                'avatar' => $user->avatar,

            ];

        endif;
    }
}
