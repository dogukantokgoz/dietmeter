<?php

namespace App\Http\Controllers\Login\Controller;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Login\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login successful']);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {   
            $user = User::create($request->validated());
            
            if($user){  
                return response()->json(['status' => 'success', 'message' => 'User created successfully']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'User created failed']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
