<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CoordinatorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'staff_id' => $this->staff_id,
            'isActive' => $this->isActive,
            'department' => $this->department,
            'company' => $this->company,
            'created_at' => Carbon::parse($this->created_at)->format('D, d F Y')
        ];
    }
}
