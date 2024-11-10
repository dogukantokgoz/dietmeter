<?php

namespace App\Http\Controllers\SportCategories\Repositories;

use App\Http\Controllers\SportCategories\Contracts\SportCategoriesInterface;
use App\Models\SportCategory;

class SportCategoriesRepository implements SportCategoriesInterface
{

    private $sportCategories;

    public function __construct(SportCategory $sportCategories)
    {
        $this->sportCategories = $sportCategories;
    }

    public function getCategories(array $columns = ['*'])
    {
        return $this->sportCategories
            ->orderBy('id', 'asc')
            ->select($columns)
            ->get();
    }

    public function getCategoryById($id, array $columns = ['*'])
    {
        return $this->sportCategories
            ->where('id', $id)
            ->select($columns)
            ->first();
    }

    public function getCategoryByName($name, array $columns = ['*'])
    {
        return $this->sportCategories
            ->where('name', $name)
            ->select($columns)
            ->first();
    }

    public function store($request)
    {
        return $this->sportCategories->create($request)->id;
    }

    public function update($request, $id)
    {
        return $this->sportCategories
            ->where('id', $id)
            ->update($request);
    }

    public function destroy($id)
    {
        return $this->sportCategories->destroy($id);
    }
}
