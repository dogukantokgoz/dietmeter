<?php 

namespace App\Http\Controllers\SportCategories\Services;

use App\Http\Controllers\SportCategories\Contracts\SportCategoriesInterface;
use App\Http\Controllers\Auth\Contracts\LoginInterface;
use App\Enumerations\SportCategories\SportCategoriesReturnMessageEnum;

class SportCategoriesService
{
    public function index()
    {
        $get_categories = app()->make(SportCategoriesInterface::class)->get_categories();
        if ($get_categories) {
            return response()->json([
                'status' => 'success',
                'data' => $get_categories
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => SportCategoriesReturnMessageEnum::NOT_FOUND
        ]);
    }
}
