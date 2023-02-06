<?php

namespace App\Http\Resources\MyRecord;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MyRecordCollection extends ResourceCollection
{
    public $collects = MyRecordResource::class;

    public function toArray($request)
    {
        return [
            'user' => $this->collection
        ];
    }
}
