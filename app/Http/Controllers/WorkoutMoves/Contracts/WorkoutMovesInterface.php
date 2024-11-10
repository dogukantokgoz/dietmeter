<?php 

namespace App\Http\Controllers\WorkoutMoves\Contracts;

interface WorkoutMovesInterface
{
    public function getMoves(array $columns = ['*']);

    public function getMoveById($id, array $columns = ['*']);

    public function getMoveByName($name, array $columns = ['*']);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);

    public function getMovesByCategoryId($category_id, array $columns = ['*']);

    public function updateForCategory($request, array $ids);
}

