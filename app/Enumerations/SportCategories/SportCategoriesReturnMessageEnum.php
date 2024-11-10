<?php

namespace App\Enumerations\SportCategories;

enum SportCategoriesReturnMessageEnum: string
{
    case NOT_FOUND = 'Categories not found';
    case AVAILABLE_NAME = 'There is such a category';
    case CREATE_SUCCESS = 'Category Created Successfully';
    case UPDATE_SUCCESS = 'Category updated Successfully';
    case UPDATE_ERROR = 'Category updating failed';
    case DELETE_SUCCESS = 'Category deleted Successfully';
    case DELETE_ERROR = 'Category deleting failed';
    case HAS_NO_MOVES = 'Category has no moves';
}
