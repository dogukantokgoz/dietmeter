<?php

namespace App\Http\Controllers\Auth\Repositories;

use App\Http\Controllers\Auth\Contracts\LoginInterface;

class LoginRepository implements LoginInterface
{
    public function register($request)
    {
        dd($request);
    }
}
