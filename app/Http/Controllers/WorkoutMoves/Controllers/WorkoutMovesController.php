<?php

namespace App\Http\Controllers\WorkoutMoves\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
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
}
