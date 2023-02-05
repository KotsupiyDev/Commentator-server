<?php

namespace App\Providers\API\Auth;

use App\Interfaces\RepositoryInterfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserRepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    public function provides(): array
    {
        return [UserRepositoryInterface::class];
    }
}
