<?php

namespace App\Enumerations\UserProfile;

enum UserProfileEnum: string
{
    case SUCCESS_CREATED = 'Profile created successfully';
    
    case FAILED_CREATED = 'Profile creation failed';

    case NOT_FOUND_PROFILE = 'Profile not found';

    case ALREADY_EXITS = 'Profile already exist';
}
