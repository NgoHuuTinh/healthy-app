<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Services\TopService;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Top\TopCollection;

class TopController extends BaseController
{
    protected $service;

    public function __construct(TopService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $user = $this->service->index($request->all());
        return (new TopCollection($user));
    }
}
