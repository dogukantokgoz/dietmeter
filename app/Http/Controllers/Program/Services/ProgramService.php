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
        $get_programs = app()->make(ProgramInterface::class)->getProgramsById($user->id, ['id', 'user_id', 'category', 'move', 'move_amount', 'set_amount', 'number_of_program']);
        
        if ($get_programs->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => ProgramReturnMessageEnum::NOT_FOUND
            ]);
        }

        $programs = [];
        foreach($get_programs as $program){
            $programs[$program->number_of_program][] = $program;
        }

        foreach ($programs as $key => $items) {
            foreach ($items as $item) {
                $categories = app()->make(SportCategoriesInterface::class)->getCategories();
                $moves = app()->make(WorkoutMovesInterface::class)->getMoves();
                $item['category'] = $categories[$item['category']]['name'] ?? null;
                $item['move'] = $moves[$item['move']]['name'] ?? null;
                $item['amount'] = $item['move_amount'] . 'x' . $item['set_amount'] ?? null;
                unset($item['set_amount'], $item['move_amount']);
            }
        }

        return response()->json([
            'status' => 'success',
            'data' => $programs            
        ]);
    }

    public function create()
    {
        $user = auth()->user();
        $get_user = app()->make(UserProfileInterface::class)->getUserProfileByUserId($user->id);
        $get_categories = app()->make(SportCategoriesInterface::class)->getCategories();
        $moves = [];

        if($get_categories) {
            foreach($get_categories as $category) {
                $get_moves_by_category_id = app()->make(WorkoutMovesInterface::class)->getMovesByCategoryId($category->id);
                foreach($get_moves_by_category_id as $move) {
                $moves[] = [
                    'category_id' => $category->id,
                    'move_name' => $move->name,
                    'move_id' => $move->id
                ];
                }               
            } 
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'user' => $get_user,
                'moves' => $moves,
                'categories' => $get_categories ?? null
                ]          
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

    public function show($number_of_program)
    {
        $get_programs = app()->make(ProgramInterface::class)->show($number_of_program, ['category', 'move', 'move_amount', 'set_amount', 'number_of_program']);
       
        if($get_programs->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => ProgramReturnMessageEnum::SHOW_ERROR
            ]);
        }
        
        foreach($get_programs as $program){
            $categories = app()->make(SportCategoriesInterface::class)->getCategories();
            $moves = app()->make(WorkoutMovesInterface::class)->getMoves();
            
            $program['category'] = $categories[$program['category']]['name'] ?? null;
            $program['move'] = $move[$program['move']]['name'] ?? null;
            $program['amount'] = $program['move_amount'] . 'x' . $program['set_amount'] ?? null;
            unset($program['move_amount'], $program['set_amount']);
        }

        return response()->json([
            'status' => 'success',
            'data' => $get_programs
        ]);
    }

    public function edit($number_of_program)
    {
        $user = auth()->user();
        $get_user = app()->make(UserProfileInterface::class)->getUserProfileByUserId($user->id);
        $get_programs = app()->make(ProgramInterface::class)->show($number_of_program, ['id','category', 'move', 'move_amount', 'set_amount', 'number_of_program']);
        $get_categories = app()->make(SportCategoriesInterface::class)->getCategories();

        $moves = [];
        foreach($get_categories as $category) {
            $get_moves_by_category_id = app()->make(WorkoutMovesInterface::class)->getMovesByCategoryId($category->id);
            foreach($get_moves_by_category_id as $move) {
                $moves[] = [
                    'category_id' => $category->id,
                    'move_name' => $move->name,
                    'move_id' => $move->id
                ];
            }               
        }

        if($get_programs->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => ProgramReturnMessageEnum::EDIT_ERROR
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'user' => $get_user,
                'programs' => $get_programs ?? null,
                'moves' => $moves ?? null, 
                'categories' => $get_categories ?? null
            ]
        ]);
    }

    public function update($request)
    {
        if(isset($request['data'])){
            foreach($request['data'] as $move){
                $update = app()->make(ProgramInterface::class)->updateById($move);
            }
        }

        if(!isset($update)){
            return response()->json([
                'status' => 'error',
                'message' => ProgramReturnMessageEnum::UPDATE_ERROR
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => ProgramReturnMessageEnum::UPDATE_SUCCESS
        ]);
    }

    public function destroy($id)
    {
        $delete = app()->make(ProgramInterface::class)->destroy($id);

        if($delete) {
            return response()->json([
                'status' => 'success',
                'data' => ProgramReturnMessageEnum::DELETE_SUCCESS 
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => ProgramReturnMessageEnum::DELETE_ERROR
        ]);
    }
}
