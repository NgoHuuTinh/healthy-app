<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Carbon;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getTopPage($userId, $genre)
    {
        $query = $this->model->with([
            'userStatisticToday' => function ($query) {
                $query->where('statistic_type', 0);
                $query->where('date', Carbon::now()->format('Y-m-d'));
            },
            'userStatistics' => function ($query) {
                $query->where('statistic_type', 2);
                $query->paginate($this->limit);
            },
            'foodUsers' => function ($query) use ($genre) {
                if (!empty($genre)) {
                    $query->where('genre_id', $genre);
                }
                $query->orderBy('date', 'desc');
                $query->paginate($this->limit);
            }
        ]);
        $query->where('id', $userId);
        return $query->get();
    }

    public function getMyRecord($userId, $statisticType)
    {
        $query = $this->model->with([
            'userStatistics' => function ($query) use ($statisticType) {
                $query->where('statistic_type', $statisticType);
                $query->orderBy('date', 'desc');
            },
            'exerciseUsers' => function ($query) {
                $query->where('date', Carbon::now()->format('Y-m-d'));
            },
            'exerciseUsers.exercise',
            'diaryUsers' => function ($query) {
                $query->paginate($this->limit);
            }
        ]);
        $query->where('id', $userId);
        return $query->get();
    }
}
