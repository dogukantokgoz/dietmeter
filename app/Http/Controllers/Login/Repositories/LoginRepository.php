<?php

namespace App\Http\Controllers\Login\Repositories;

use App\Http\Controllers\Login\Contracts\LoginInterface;

class LoginRepository implements LoginInterface
{
    public function register($request)
    {
        dd($request);
    }
}
