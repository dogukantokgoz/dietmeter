<?php

namespace App\Http\Controllers\UserProfile\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\UserProfile\Services\UserProfileService;
use App\Http\Controllers\UserProfile\Requests\UserProfileIndexRequest;


class UserProfileController extends Controller
{

    private $service;

    public function __construct(UserProfileService $service)
    {
        $this->service = $service;
    }
    
    public function index(UserProfileIndexRequest $request)
    {
       return $this->service->index($request);
    }
}
