<?php 

namespace App\Http\Controllers\WorkoutMoves\Services;

use App\Http\Controllers\WorkoutMoves\Contracts\WorkoutMovesInterface;
use App\Http\Controllers\SportCategories\Contracts\SportCategoriesInterface;
use App\Http\Controllers\Auth\Contracts\LoginInterface;
use App\Enumerations\WorkoutMoves\WorkoutMovesReturnMessageEnum;

class WorkoutMovesService
{
    public function index()
    {
        $get_moves = app()->make(WorkoutMovesInterface::class)->getMoves();

        if ($get_moves) {
            return response()->json([
                'status' => 'success',
                'data' => $get_moves
            ]);
        }

        return $this->returnError(WorkoutMovesReturnMessageEnum::NOT_FOUND);
    }

    public function create() 
    {
        $get_categories = app()->make(SportCategoriesInterface::class)->getCategories(['id', 'category_name']);

        return response()->json([
            'status' => 'success',
            'data' => $get_categories
        ]);
    }

    public function store($request) 
    {
        $create_move = app()->make(WorkoutMovesInterface::class)->getMoveByName($request->name);
        if($create_move) {
            return $this->returnError(WorkoutMovesReturnMessageEnum::AVAILABLE_NAME);
        }

        $create_move = app()->make(WorkoutMovesInterface::class)->store(['category_id' => $request->category_id , 'name' => $request->name]);

        return response()->json([
            'status' => 'success',
            'message' => WorkoutMovesReturnMessageEnum::CREATE_SUCCESS
        ]);
    }

    public function show($id)
    {
        $get_move = app()->make(WorkoutMovesInterface::class)->getMoveById($id, ['id', 'category_id', 'name']);
        $get_category = app()->make(SportCategoriesInterface::class)->getCategoryById($get_move->category_id, ['id', 'category_name']);

        if($get_move && $get_category) {

            return response()->json([
                'status' => 'success',
                'data' => ['move' => $get_move, 'category' => $get_category]
            ]);
        }

        return $this->returnError(WorkoutMovesReturnMessageEnum::NOT_FOUND);
    }

    public function edit($id)
    {
        $get_move = app()->make(WorkoutMovesInterface::class)->getMoveById($id, ['id', 'category_id', 'name']);
        $get_category = app()->make(SportCategoriesInterface::class)->getCategoryById($get_move->category_id, ['id', 'category_name']);

        if($get_move && $get_category) {

            return response()->json([
                'status' => 'success',
                'data' => ['move' => $get_move, 'category' => $get_category]
            ]);
        }

        return $this->returnError(WorkoutMovesReturnMessageEnum::NOT_FOUND);
    }

    public function update($request, $id)
    {
        $update = app()->make(WorkoutMovesInterface::class)->update(['category_id' => $request->category_id, 'name' => $request->name], $id);

        if($update) {
            return response()->json([
                'status' => 'success',
                'data' => WorkoutMovesReturnMessageEnum::UPDATE_SUCCESS
            ]);
        }

        return $this->returnError(WorkoutMovesReturnMessageEnum::UPDATE_ERROR);
    }

    public function destroy($id)
    {
        $delete = app()->make(WorkoutMovesInterface::class)->destroy($id);

        if($delete) {
            return response()->json([
                'status' => 'success',
                'data' => WorkoutMovesReturnMessageEnum::DELETE_SUCCESS
            ]);
        }

        return $this->returnError(WorkoutMovesReturnMessageEnum::DELETE_ERROR);
    }

    public function returnError($message) 
    {
        return response()->json([
            'status' => 'error',
            'message' => $message
        ]);
    }
}
