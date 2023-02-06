<?php

namespace App\Http\Resources\ExerciseUser;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseUserResource extends JsonResource
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
            'exersice_name' => $this->exercise->name,
            'date' => $this->date,
            'minute' => $this->minute,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
