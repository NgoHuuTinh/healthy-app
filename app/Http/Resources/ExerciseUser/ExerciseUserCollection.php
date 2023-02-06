<?php

namespace App\Http\Resources\ExerciseUser;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExerciseUserCollection extends ResourceCollection
{
    public $collects = ExerciseUserResource::class;

    public function toArray($request)
    {
        return [
            'exercise_user' => $this->collection
        ];
    }
}
