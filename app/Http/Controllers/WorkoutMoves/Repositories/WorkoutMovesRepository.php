<?php

namespace App\Http\Controllers\WorkoutMoves\Repositories;

use App\Http\Controllers\WorkoutMoves\Contracts\WorkoutMovesInterface;
use App\Models\WorkoutMoves;

class WorkoutMovesRepository implements WorkoutMovesInterface
{

    private $workoutMoves;

    public function __construct(WorkoutMoves $workoutMoves)
    {
        $this->workoutMoves = $workoutMoves;
    }

    public function get_moves()
    {
        return $this->workoutMoves
            ->orderBy('id', 'asc')
            ->get();
    }
}
