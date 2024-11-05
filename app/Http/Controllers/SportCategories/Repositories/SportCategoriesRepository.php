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

    public function get_categories()
    {
        return $this->sportCategories
            ->orderBy('id', 'asc')
            ->get();
    }
}
