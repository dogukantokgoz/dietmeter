<?php 

namespace App\Http\Controllers\Program\Services;

use App\Http\Controllers\Program\Contracts\ProgramInterface;
use App\Http\Controllers\UserProfile\Contracts\UserProfileInterface;
use App\Http\Controllers\WorkoutMoves\Contracts\WorkoutMovesInterface;
use App\Http\Controllers\SportCategories\Contracts\SportCategoriesInterface;
use App\Enumerations\Program\ProgramReturnMessageEnum;

class ProgramService
{
    public function index()
    {
        $user = auth()->user();
        $get_programs = app()->make(ProgramInterface::class)->getProgramsById($user->id);
        $program = [];

        if ($get_programs->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => ProgramReturnMessageEnum::NOT_FOUND
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $get_programs            
        ]);
    }

    public function create()
    {
        $user = auth()->user();
        $get_user = app()->make(UserProfileInterface::class)->getUserProfileByUserId($user->id);
        $get_categories = app()->make(SportCategoriesInterface::class)->getCategories();
        $moves = [];
        foreach($get_categories as $category) {
            $get_moves_by_category_id = app()->make(WorkoutMovesInterface::class)->getMovesByCategoryId($category->id);
            foreach($get_moves_by_category_id as $move) {
               $moves[$category->name][] = $move->name;
            }               
        }

        return response()->json([
            'status' => 'success',
            'data' => $moves            
        ]);
    }

    public function store($request)
    {
        $user = auth()->user();
        $get_last_program = app()->make(ProgramInterface::class)->getProgramByUserId($user->id);

        $number_of_program = $get_last_program ? $get_last_program->number_of_program + 1 : 1;     

        $program = $request->input('data');
        foreach($program as $data) {
            $create = app()->make(ProgramInterface::class)->store($data, $number_of_program, $user->id);
        }

        return response()->json([
            'status' => 'success',
            'message' => ProgramReturnMessageEnum::CREATE_SUCCESS
        ]);
    }
}
