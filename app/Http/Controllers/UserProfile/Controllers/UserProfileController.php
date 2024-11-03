<?php

namespace App\Http\Controllers\UserProfile\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\UserProfile\Services\UserProfileService;
use App\Http\Controllers\UserProfile\Requests\UserProfileStoreRequest;


class UserProfileController extends Controller
{

    private $service;

    public function __construct(UserProfileService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
       return $this->service->index();
    }

    public function store(UserProfileStoreRequest $request)
    {
        return $this->service->store($request);
    }
}
