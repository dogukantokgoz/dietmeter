<?php

namespace App\Http\Controllers\Auth\Controller;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Requests\RegisterRequest;
use App\Http\Controllers\Auth\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $token = JWTAuth::attempt($credentials);
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized'
                ], 401);
            }
            return response()->json(['message' => 'Login successful', 'token' => $token]);
        }
        
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout()
    {
        JWTAuth::invalidate();
        return response()->json(['message' => 'Logout successful']);
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
