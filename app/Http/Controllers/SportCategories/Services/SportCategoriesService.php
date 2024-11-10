<?php 

namespace App\Http\Controllers\SportCategories\Services;

use App\Http\Controllers\SportCategories\Contracts\SportCategoriesInterface;
use App\Http\Controllers\WorkoutMoves\Contracts\WorkoutMovesInterface;
use App\Http\Controllers\Auth\Contracts\LoginInterface;
use App\Enumerations\SportCategories\SportCategoriesReturnMessageEnum;
use App\Enumerations\WorkoutMoves\WorkoutMovesReturnMessageEnum;
use App\Enumerations\SportCategories\SportCategoriesIdEnum;

class SportCategoriesService
{
    public function index()
    {
        $get_categories = app()->make(SportCategoriesInterface::class)->getCategories();

        if ($get_categories->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => SportCategoriesReturnMessageEnum::NOT_FOUND
            ]);
        }

        if ($get_categories) {
            return response()->json([
                'status' => 'success',
                'data' => $get_categories
            ]);
        }
    }

    
    public function create() 
    {
        $get_moves = app()->make(WorkoutMovesInterface::class)->getMoves(['id', 'category_id', 'name']);

        if($get_moves->isEmpty())
        return response()->json([
            'status' => 'success',
            'message' => WorkoutMovesReturnMessageEnum::NOT_FOUND
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $get_moves
        ]);
    }

    public function store($request) 
    {
        $control = app()->make(SportCategoriesInterface::class)->getCategoryByName(['name' => $request->category_name]);

        if($control){
            return $this->returnError(SportCategoriesReturnMessageEnum::AVAILABLE_NAME);
        }

        $create_category = app()->make(SportCategoriesInterface::class)->store(['name' => $request->category_name]);
        
        if($request->move_id){
            $update_move = app()->make(WorkoutMovesInterface::class)->updateForCategory(['category_id' => $create_category], $request->move_id);
        }

        return response()->json([
            'status' => 'success',
            'message' => SportCategoriesReturnMessageEnum::CREATE_SUCCESS
        ]);
    }

    public function show($id)
    {
        $get_category = app()->make(SportCategoriesInterface::class)->getCategoryById($id, ['id', 'name']);
        $get_moves = app()->make(WorkoutMovesInterface::class)->getMovesByCategoryId($id, ['id', 'name']);

        if(empty($get_category))
        return $this->returnError(SportCategoriesReturnMessageEnum::NOT_FOUND);

        return response()->json([
            'status' => 'success',
            'data' => ['category' => $get_category, 'moves' => $get_moves]
        ]);
    }

    public function edit($id)
    {
        $get_category = app()->make(SportCategoriesInterface::class)->getCategoryById($id, ['id', 'name']);
        $get_moves = app()->make(WorkoutMovesInterface::class)->getMovesByCategoryId($id, ['id', 'name']);

        if($get_moves && $get_category) {
            return response()->json([
                'status' => 'success',
                'data' => ['category' => $get_category, 'moves' => $get_moves]
            ]);
        }

        return $this->returnError(SportCategoriesReturnMessageEnum::NOT_FOUND);
    }

    public function update($request, $id)
    {
        $update = app()->make(SportCategoriesInterface::class)->update(['name' => $request->category_name], $id);

        if($request->move_id){
            $update_move = app()->make(WorkoutMovesInterface::class)->updateForCategory(['category_id' => $id], $request->move_id);
        }

        if($update) {
            return response()->json([
                'status' => 'success',
                'data' => SportCategoriesReturnMessageEnum::UPDATE_SUCCESS
            ]);
        }

        return $this->returnError(SportCategoriesReturnMessageEnum::UPDATE_ERROR);
    }

    public function destroy($id)
    {
        $delete = app()->make(SportCategoriesInterface::class)->destroy($id);

        if($delete) {
            return response()->json([
                'status' => 'success',
                'data' => SportCategoriesReturnMessageEnum::DELETE_SUCCESS
            ]);
        }

        return $this->returnError(SportCategoriesReturnMessageEnum::DELETE_ERROR);
    }

    public function returnError($message) 
    {
        return response()->json([
            'status' => 'error',
            'message' => $message
        ]);
    }

}
