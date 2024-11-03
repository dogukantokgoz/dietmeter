<?php

namespace App\Enumerations\UserProfile;

enum UserProfileEnum: string
{
    case SUCCESS_CREATED = 'Profile created successfully';
    
    case SUCCESS_FAILED = 'Profile creation failed';

    case NOT_FOUND_PROFILE = 'Profile not found';
}
