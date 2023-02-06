<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryInterface;

class MyRecordService
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function index(array $params)
    {
        $params = collect($params);
        $userId = Auth::user()->id;
        $statisticType = $params->get('statistic_type', 3); // 0: day | 1: week | 2: month | 3: year
        return $this->userRepositoryInterface->getMyRecord($userId, $statisticType);
    }
}
