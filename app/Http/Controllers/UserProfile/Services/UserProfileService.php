<?php 

namespace App\Http\Controllers\UserProfile\Services;

use App\Http\Controllers\UserProfile\Contracts\UserProfileInterface;

class UserProfileService
{

    public function index($request)
    {
        $get_profile = app()->make(UserProfileInterface::class)->getUserProfileById($id);
    }
}
