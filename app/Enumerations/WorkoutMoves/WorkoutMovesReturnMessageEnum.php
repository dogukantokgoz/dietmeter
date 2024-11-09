<?php

namespace App\Enumerations\WorkoutMoves;

enum WorkoutMovesReturnMessageEnum: string
{
    case NOT_FOUND = 'Moves not found';
    case CREATE_SUCCESS = 'Move Created Successfully';
    case UPDATE_SUCCESS = 'Move updated Successfully';
    case UPDATE_ERROR = 'Move updating failed';
    case AVAILABLE_NAME = 'There is such a move';
    case DELETE_SUCCESS = 'Move deleted Successfully';
    case DELETE_ERROR = 'Move deleting failed';
}
