<?php 

namespace App\Http\Controllers\SportCategories\Contracts;

interface SportCategoriesInterface
{
    public function getCategories(array $columns = ['*']);

    public function getCategoryById($id, array $columns = ['*']);

    public function getCategoryByName($name, array $columns = ['*']);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}

