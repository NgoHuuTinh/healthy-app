<?php

namespace App\Http\Controllers\API\V1;

use App\Services\UserService;
use App\Http\Requests\User\UserRequest;
use App\Http\Controllers\BaseController;
use App\Http\Requests\User\LoginRequest;

class UserController extends BaseController
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @lrd:start
     *
     * Register account
     *
     * post api/auth/singup
     *
     * @QAparam name string required
     * @QAparam username string required unique
     * @QAparam password string required confirmed
     *
     * @lrd:end
     */
    public function signup(UserRequest $request)
    {
        $user = $this->service->signup($request->validated());
        if (!$user) {
            return $this->respondError('register fail');
        }
        return $this->respond($user);
    }

    /**
     * @lrd:start
     *
     * Login
     *
     * post api/auth/login
     *
     * @QAparam username required
     * @QAparam password required
     *
     * @lrd:end
     */
    public function login(LoginRequest $request)
    {
        $user = $this->service->login($request->validated());
        if (!$user) {
            return $this->respondUnauthorized();
        }
        return $this->respond($user);
    }
}
