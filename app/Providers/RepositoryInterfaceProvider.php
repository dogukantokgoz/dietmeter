<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Controllers\UserProfile\Contracts\UserProfileInterface;
use App\Http\Controllers\UserProfile\Repositories\UserProfileRepository;


class RepositoryInterfaceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserProfileInterface::class,
            UserProfileRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
