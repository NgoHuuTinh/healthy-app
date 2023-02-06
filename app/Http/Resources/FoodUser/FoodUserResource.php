<?php

namespace App\Http\Resources\FoodUser;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodUserResource extends JsonResource
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
            'food_id' => $this->food_id, // use attribute funtion to get image food
            'genre_id' => $this->genre_id, // use attribute funtion to get genre
            'date' => $this->date,
            'gram' => $this->gram,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
