<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use App\Repositories\User\UserRepositoryInterface;

class UserService
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function signup(array $params)
    {
        $params = collect($params);
        return $this->userRepositoryInterface->create([
            'name' => $params->get('name'),
            'username' => $params->get('username'),
            'password' => bcrypt($params->get('password'))
        ]);
    }

    public function login(array $params)
    {
        $params = collect($params);
        $token = JWTAuth::attempt(['username' => $params->get('username'), 'password' => $params->get('password')]);
        $result = false;
        if ($token) {
            $user = Auth::user();
            $result =  [
                'user' => $user,
                'authorization' => ['token' => $token, 'type' => 'bearer']
            ];
        }
        return $result;
    }
}
