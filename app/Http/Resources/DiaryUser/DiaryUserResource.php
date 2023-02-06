<?php

namespace App\Http\Resources\DiaryUser;

use Illuminate\Http\Resources\Json\JsonResource;

class DiaryUserResource extends JsonResource
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
            'name' => $this->user_id,
            'type' => $this->type_id == 0 ? 'food' : 'exercise',
            'date' => $this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
