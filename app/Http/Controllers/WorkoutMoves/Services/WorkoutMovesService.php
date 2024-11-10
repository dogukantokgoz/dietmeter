<?php 

namespace App\Http\Controllers\WorkoutMoves\Services;

use App\Http\Controllers\WorkoutMoves\Contracts\WorkoutMovesInterface;
use App\Http\Controllers\SportCategories\Contracts\SportCategoriesInterface;
use App\Http\Controllers\Auth\Contracts\LoginInterface;
use App\Enumerations\WorkoutMoves\WorkoutMovesReturnMessageEnum;
use App\Enumerations\SportCategories\SportCategoriesReturnMessageEnum;

class WorkoutMovesService
{
    public function index()
    {
        $get_moves = app()->make(WorkoutMovesInterface::class)->getMoves();
        
        if ($get_moves->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => WorkoutMovesReturnMessageEnum::NOT_FOUND
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $get_moves
        ]);
    }

    public function create() 
    {
        $get_categories = app()->make(SportCategoriesInterface::class)->getCategories(['id', 'name']);
        
        if ($get_categories->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => SportCategoriesReturnMessageEnum::NOT_FOUND
            ]);
        }
        
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

        if(isset($get_move->category_id) && $get_move->category_id != null) {
            $get_category = app()->make(SportCategoriesInterface::class)->getCategoryById($get_move->category_id, ['id', 'name']);
        
            if($get_move && $get_category) {
                return response()->json([
                   'status' => 'success',
                    'data' => ['move' => $get_move, 'category' => $get_category]
             ]);
            }
        }

        if(empty($get_move))
        return $this->returnError(WorkoutMovesReturnMessageEnum::NOT_FOUND);

        return response()->json([
            'status' => 'success',
            'data' => ['move' => $get_move, 'category' => $get_category ?? WorkoutMovesReturnMessageEnum::UNCATEGORIZED_MOVE]
         ]);
    }

    public function edit($id)
    {
        $get_move = app()->make(WorkoutMovesInterface::class)->getMoveById($id, ['id', 'category_id', 'name']);

        if(isset($get_move->category_id) && $get_move->category_id != null) {
            $get_category = app()->make(SportCategoriesInterface::class)->getCategoryById($get_move->category_id, ['id', 'name']);
        
            if($get_move && $get_category) {
                return response()->json([
                   'status' => 'success',
                    'data' => ['move' => $get_move, 'category' => $get_category]
             ]);
            }
        }

        if(empty($get_move))
        return $this->returnError(WorkoutMovesReturnMessageEnum::NOT_FOUND);

        return response()->json([
            'status' => 'success',
            'data' => ['move' => $get_move, 'category' => $get_category ?? WorkoutMovesReturnMessageEnum::UNCATEGORIZED_MOVE]
         ]);
    }

    public function update($request, $id)
    {
        $update = app()->make(WorkoutMovesInterface::class)->update(['category_id' => $request->category_id ?? null, 'name' => $request->name], $id);

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
