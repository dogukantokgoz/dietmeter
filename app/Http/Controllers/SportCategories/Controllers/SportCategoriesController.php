<?php

namespace App\Http\Controllers\SportCategories\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\SportCategories\Services\SportCategoriesService;


class SportCategoriesController extends Controller
{

    private $service;

    public function __construct(SportCategoriesService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        return $this->service->index();
    }
}
