<?php

namespace App\Enumerations\Program;

enum ProgramReturnMessageEnum: string
{
    case NOT_FOUND = 'You have not a program';
    case CREATE_SUCCESS = 'Your program is created successfully';
}
