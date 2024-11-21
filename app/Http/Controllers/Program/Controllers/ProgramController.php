<?php

namespace App\Http\Controllers\Program\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Program\Services\ProgramService;

class ProgramController extends Controller
{
    private $service;

    public function __construct(ProgramService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        return $this->service->index();
    }
}
