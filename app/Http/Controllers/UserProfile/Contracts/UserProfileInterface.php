<?php 

namespace App\Http\Controllers\UserProfile\Contracts;

interface UserProfileInterface
{
    public function getUserProfileByUserId($user_id);

    public function store($user_id, $request); 
}

