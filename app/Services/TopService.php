<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryInterface;


class TopService
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
        $genre = $params->get('genre', '');
        return $this->userRepositoryInterface->getTopPage($userId, $genre);
    }
}