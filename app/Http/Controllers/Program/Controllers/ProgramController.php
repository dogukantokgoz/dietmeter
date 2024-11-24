<?php

namespace App\Http\Controllers\Program\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Program\Services\ProgramService;
use App\Http\Controllers\Program\Requests\ProgramStoreRequest;
use App\Http\Controllers\Program\Requests\ProgramUpdateRequest;

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

    public function create()
    {
        return $this->service->create();
    }

    public function store(ProgramStoreRequest $request)
    {
        return $this->service->store($request);
    }

    public function show($number_of_program)
    {
        return $this->service->show($number_of_program);
    }

    public function edit($number_of_program)
    {
        return $this->service->edit($number_of_program);
    }

    public function update(ProgramUpdateRequest $request)
    {
        return $this->service->update($request);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
