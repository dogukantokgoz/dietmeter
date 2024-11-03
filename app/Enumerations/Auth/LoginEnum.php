<?php

namespace App\Enumerations\Auth;

enum LoginEnum: string
{
    case SUCCESS_CREATED = 'User created successfully';
    
    case FAILED_CREATED = 'User creation failed';
}
