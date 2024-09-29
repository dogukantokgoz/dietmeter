<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ControllerTry extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'hello']);
    }
}
