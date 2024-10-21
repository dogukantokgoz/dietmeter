<?php

namespace App\Http\Controllers\Auth\Repositories;

use App\Http\Controllers\Auth\Contracts\LoginInterface;

class LoginRepository implements LoginInterface
{
    public function register($request)
    {
        return User::create($request->validated());
    }
}
