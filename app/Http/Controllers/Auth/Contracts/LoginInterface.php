<?php 

namespace App\Http\Controllers\Auth\Contracts;

interface LoginInterface
{
    public function register($request);

    public function getUser($id);
}

