<?php

namespace App\Http\Resources\UserStatistic;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserStatisticCollection extends ResourceCollection
{
    public $collects = UserStatisticResource::class;

    public function toArray($request)
    {
        return [
            'user_statistics' => $this->collection
        ];
    }
}
