<?php

namespace App\Http\Resources\Top;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FoodUser\FoodUserResource;
use App\Http\Resources\UserStatistic\UserStatisticResource;

class TopResource extends JsonResource
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
            'food_users' => FoodUserResource::collection($this->foodUsers),
            'today_statistic' => UserStatisticResource::collection($this->userStatisticToday),
            'month_statistics' => UserStatisticResource::collection($this->userStatistics),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
