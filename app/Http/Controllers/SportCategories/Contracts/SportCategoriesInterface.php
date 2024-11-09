<?php 

namespace App\Http\Controllers\SportCategories\Contracts;

interface SportCategoriesInterface
{
    public function getCategories(array $columns = ['*']);

    public function getCategoryById($id, array $columns = ['*']);
}

