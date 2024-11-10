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

    public function getMoves(array $columns = ['*'])
    {
        return $this->workoutMoves
            ->orderBy('id', 'asc')
            ->select($columns)
            ->get();
    }

    public function getMoveById($id, array $columns = ['*'])
    {
        return $this->workoutMoves
            ->where('id', $id)
            ->select($columns)
            ->first();
    }

    public function getMoveByName($name, array $columns = ['*'])
    {
        return $this->workoutMoves
            ->where('name', $name)
            ->select($columns)
            ->first();
    }

    public function store($request)
    {
        return $this->workoutMoves->create($request);
    }

    public function update($request, $id)
    {
        return $this->workoutMoves->where('id', $id)->update($request);
    }
    
    public function destroy($id)
    {
        return $this->workoutMoves->destroy($id);
    }

    public function getMovesByCategoryId($category_id, array $columns = ['*'])
    {
        return $this->workoutMoves
            ->where('category_id', $category_id)
            ->orderBy('name', 'asc')
            ->select($columns)
            ->get();
    }

    public function updateForCategory($request, array $ids)
    {
        return $this->workoutMoves
            ->whereIn('id', $ids)
            ->update($request);
    }
    
}
