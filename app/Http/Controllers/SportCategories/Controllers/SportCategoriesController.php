<?php

namespace App\Http\Controllers\SportCategories\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\SportCategories\Requests\SportCategoriesStoreRequest;
use App\Http\Controllers\SportCategories\Requests\SportCategoriesUpdateRequest;
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

    public function create()
    {
        return $this->service->create();
    }

    public function store(SportCategoriesStoreRequest $request)
    {
        return $this->service->store($request);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function update(SportCategoriesUpdateRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
