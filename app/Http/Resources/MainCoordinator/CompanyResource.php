<?php

namespace App\Http\Resources\MainCoordinator;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'company_name' => $this->company_name,
            'email' => $this->email,
            'city' => $this->city,
            'total_slots' => $this->total_slots,
            'location' => $this->location,
            'created_at' => Carbon::parse($this->created_at)->format('D, d F Y')
        ];
    }
}
