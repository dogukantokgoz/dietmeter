<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerTry;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/try', [ControllerTry::class, 'index'])->name('home');
