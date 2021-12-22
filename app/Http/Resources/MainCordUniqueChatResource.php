<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class MainCordUniqueChatResource extends JsonResource
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

        return [

            'student_id' => $user->id,
            'avatar' => $user->avatar,
            'from_student' => $this->from_student,
            'from_main_cordinator' => $this->from_main_cordinator,
            'student_name' => $user->name,
            'message' => $this->message,
            'student_read_at' => $this->student_read_at

        ];

    }
}
