<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class travelResource extends JsonResource
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
            'region' => $this->getRegion,
            'date_travel' => $this->date,
            'count_days' => $this->count_days,
        ];
    }
}
