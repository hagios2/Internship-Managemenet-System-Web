<?php

namespace App\Http\Resources\MainCoordinator;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->department,
            'number_of_staff' => $this->number_of_staff ?? 0,
            'number_of_student' => $this->number_of_student ?? 0,
            'created_at' => Carbon::parse($this->created_at)->format('D, d F Y')
        ];
    }
}
