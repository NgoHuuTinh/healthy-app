<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getMyRecord($userId, $statisticType);
    
    public function getTopPage($userId, $genre);
}
