<?php

namespace App\Http\Resources\UserStatistic;

use Illuminate\Http\Resources\Json\JsonResource;

class UserStatisticResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'statistic_name' => $this->statistic_name,
            'date' => $this->date,
            'target' => $this->target,
            'reality' => $this->reality,
            'reality_percent' => $this->reality_percent,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
