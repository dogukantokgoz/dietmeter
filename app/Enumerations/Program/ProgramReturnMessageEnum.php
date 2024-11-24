<?php

namespace App\Enumerations\Program;

enum ProgramReturnMessageEnum: string
{
    case NOT_FOUND = 'You have not a program';
    case CREATE_SUCCESS = 'Your program is created successfully';
    case SHOW_ERROR = 'This program is undefined';
    case EDIT_ERROR = "You can't edit this program";
    case UPDATE_SUCCESS = 'Program updated Successfully';
    case UPDATE_ERROR = 'Program updating failed';
    case DELETE_SUCCESS = 'Program delete Successfully';
    case DELETE_ERROR = 'Program deleting failed';
}
