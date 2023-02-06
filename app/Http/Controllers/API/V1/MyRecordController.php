<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Services\MyRecordService;
use App\Http\Controllers\BaseController;
use App\Http\Resources\MyRecord\MyRecordCollection;

class MyRecordController extends BaseController
{
    protected $service;

    public function __construct(MyRecordService $service)
    {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {
        $user = $this->service->index($request->all());
        return (new MyRecordCollection($user));
    }
}
