<?php

namespace App\Providers;

use App\Repository\UserRepository;
use App\Repository\UserRepositoryInterface;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class UserRepositoryProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }
}
