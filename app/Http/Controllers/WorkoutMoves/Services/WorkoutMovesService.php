<?php 

namespace App\Http\Controllers\WorkoutMoves\Services;

use App\Http\Controllers\WorkoutMoves\Contracts\WorkoutMovesInterface;
use App\Http\Controllers\Auth\Contracts\LoginInterface;
use App\Enumerations\WorkoutMoves\WorkoutMovesReturnMessageEnum;

class WorkoutMovesService
{
    public function index()
    {
        $get_moves = app()->make(WorkoutMovesInterface::class)->get_moves();
        if ($get_moves) {
            return response()->json([
                'status' => 'success',
                'data' => $get_moves
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' =>WorkoutMovesReturnMessageEnum::NOT_FOUND
        ]);
    }
}
