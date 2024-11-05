<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Controller\AuthController;
use App\Http\Controllers\UserProfile\Controllers\UserProfileController;
use App\Http\Controllers\WorkoutMoves\Controllers\WorkoutMovesController;
use App\Http\Controllers\SportCategories\Controllers\SportCategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Login
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //UserProfile
    Route::resource('/profile', UserProfileController::class);

    //WorkoutMoves
    Route::resource('/workout', WorkoutMovesController::class);

    //SportCategories
    Route::resource('/sport-categories', SportCategoriesController::class);
});