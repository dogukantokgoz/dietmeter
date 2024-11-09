<?php

namespace App\Http\Controllers\WorkoutMoves\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\WorkoutMoves\Requests\MoveStoreRequest;
use App\Http\Controllers\WorkoutMoves\Requests\MoveUpdateRequest;
use App\Http\Controllers\WorkoutMoves\Services\WorkoutMovesService;


class WorkoutMovesController extends Controller
{

    private $service;

    public function __construct(WorkoutMovesService $service)
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

    public function store(MoveStoreRequest $request)
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

    public function update(MoveUpdateRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
