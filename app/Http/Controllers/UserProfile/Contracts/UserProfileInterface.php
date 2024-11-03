<?php 

namespace App\Http\Controllers\UserProfile\Contracts;

interface UserProfileInterface
{
    public function getUserProfileById($id);

    public function store($user_id, $request); 
}

