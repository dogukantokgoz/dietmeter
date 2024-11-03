<?php

namespace App\Http\Controllers\Auth\Repositories;

use App\Http\Controllers\Auth\Contracts\LoginInterface;
use App\Models\User;

class LoginRepository implements LoginInterface
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($request)
    {
        return $this->user->create($request->all());
    }
}
