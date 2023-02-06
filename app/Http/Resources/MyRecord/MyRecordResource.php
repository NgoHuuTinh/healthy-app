<?php

namespace App\Http\Resources\MyRecord;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserStatistic\UserStatisticResource;
use App\Http\Resources\DiaryUser\DiaryUserResource;
use App\Http\Resources\ExerciseUser\ExerciseUserResource;

class MyRecordResource extends JsonResource
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
            'exercise_users' => ExerciseUserResource::collection($this->exerciseUsers),
            'user_statistics' => UserStatisticResource::collection($this->userStatistics),
            'diary_users' => DiaryUserResource::collection($this->diaryUsers)
        ];
    }
}
