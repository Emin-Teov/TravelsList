<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userResource extends JsonResource
{
    public function toArray($request)
    {
        $old = strtotime("now") - strtotime($this->brith_date);
        return [
            'id' => $this->id,
            'name' => $this->name.' '.$this->surname,
            'male' => $this->male,
            'old' => floor($old/31536000),
            'mobile' => $this->mobile,
            'car' => $this->getCar,
            'travels' => $this->getTravels,
            'created' => $this->created_at,
        ];
    }
}
