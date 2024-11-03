<?php

namespace App\Http\Controllers\UserProfile\Repositories;

use App\Http\Controllers\UserProfile\Contracts\UserProfileInterface;
use App\Models\UserProfile;

class UserProfileRepository implements UserProfileInterface
{

    private $userProfile;

    public function __construct(UserProfile $userProfile)
    {
        $this->userProfile = $userProfile;
    }

    public function store($user_id, $request) 
    {
        return $this->userProfile->create(
            array_merge($request->all(), ['user_id' => $user_id]));
    }

    public function getUserProfileByUserId($user_id)
    {
        return $this->userProfile
        ->where('user_id', $user_id)
        ->orderBy('id', 'desc')
        ->first();
    }
}
