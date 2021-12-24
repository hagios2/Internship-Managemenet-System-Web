<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentNotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('i, M Y');

        return [

            'id' => $this->id,
            'user_id' => $this->user_id,
            'main_cordinator_id' => $this->main_cordinator_id,
            'cordinator_id' => $this->cordinator_id,
            'notification_type' => $this->notification_type,
            'route' => $this->route,
            'status' => $this->status,
            'date' => $date,
        ];

    }
}
