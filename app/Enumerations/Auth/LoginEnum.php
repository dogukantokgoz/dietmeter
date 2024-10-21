<?php

namespace App\Enumerations\Auth;

enum LoginEnum: string
{
    case SUCCESS_CREATED = 'User created successfully';
    
    case SUCCESS_FAILED = 'User creation failed';
}
