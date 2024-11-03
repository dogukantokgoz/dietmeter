<?php 

namespace App\Http\Controllers\UserProfile\Services;

use App\Http\Controllers\UserProfile\Contracts\UserProfileInterface;
use App\Enumerations\UserProfile\UserProfileEnum;

class UserProfileService
{

    public function index()
    {
        $user = auth()->user();
        $get_profile = app()->make(UserProfileInterface::class)->getUserProfileById($user->id);
        if($get_profile) {
            return response()->json([
                "status" => "success",
                "user" => $get_profile
            ]);
        }

        return response()->json([
            "status" => "error",
            "user" => UserProfileEnum::NOT_FOUND_PROFILE
        ]);
    }

    public function store($request)
    {
        $user = auth()->user();
        if($user) {
            $store = app()->make(UserProfileInterface::class)->store($user->id, $request);
            return response()->json([
                "status" => "success",
                "message" => UserProfileEnum::SUCCESS_CREATED
            ]);
        }
        return response()->json([
            "status" => "error",
            "message" => UserProfileEnum::FAILED_CREATED
        ]);
    }
}
