<?php

namespace App\Http\Resources\Top;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TopCollection extends ResourceCollection
{
    public $collects = TopResource::class;

    public function toArray($request)
    {
        return [
            'user' => $this->collection
        ];
    }
}
