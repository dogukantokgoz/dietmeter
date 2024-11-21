<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Controllers\UserProfile\Contracts\UserProfileInterface;
use App\Http\Controllers\UserProfile\Repositories\UserProfileRepository;
use App\Http\Controllers\Auth\Contracts\LoginInterface;
use App\Http\Controllers\Auth\Repositories\LoginRepository;
use App\Http\Controllers\WorkoutMoves\Contracts\WorkoutMovesInterface;
use App\Http\Controllers\WorkoutMoves\Repositories\WorkoutMovesRepository;
use App\Http\Controllers\SportCategories\Contracts\SportCategoriesInterface;
use App\Http\Controllers\SportCategories\Repositories\SportCategoriesRepository;
use App\Http\Controllers\Program\Contracts\ProgramInterface;
use App\Http\Controllers\Program\Repositories\ProgramRepository;

class RepositoryInterfaceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserProfileInterface::class, UserProfileRepository::class);
        $this->app->bind(LoginInterface::class, LoginRepository::class);
        $this->app->bind(WorkoutMovesInterface::class, WorkoutMovesRepository::class);
        $this->app->bind(SportCategoriesInterface::class, SportCategoriesRepository::class);
        $this->app->bind(ProgramInterface::class, ProgramRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
