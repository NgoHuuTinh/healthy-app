<?php

namespace App\Http\Resources\FoodUser;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FoodUserCollection extends ResourceCollection
{
    public $collects = FoodUserResource::class;

    public function toArray($request)
    {
        return [
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'total' => $this->total(),
            'per_page' => $this->perPage(),
            'food_user' => $this->collection 
        ];
    }
}
