<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PointResource extends JsonResource
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
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'full_address' => $this->address->full,
            'city' => $this->address->city->name,
            'region' => $this->address->city->region->name,
        ];
    }
}
