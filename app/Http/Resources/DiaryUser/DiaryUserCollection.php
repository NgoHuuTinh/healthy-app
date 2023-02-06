<?php

namespace App\Http\Resources\DiaryUser;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DiaryUserCollection extends ResourceCollection
{
    public $collects = DiaryUserResource::class;

    public function toArray($request)
    {
        return [
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'total' => $this->total(),
            'per_page' => $this->perPage(),
            'diary_user' => $this->collection
        ];
    }
}
