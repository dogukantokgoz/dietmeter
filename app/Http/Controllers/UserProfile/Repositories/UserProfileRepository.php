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

    public function getUserProfileById($id)
    {
        return $this->userProfile
        ->where('id', $id)
        ->get();
    }
}
