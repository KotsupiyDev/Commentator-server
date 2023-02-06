<?php

namespace App\Providers\API\Auth;

use App\Interfaces\ServiceInterfaces\AuthServiceInterface;
use App\Services\AuthService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RegistrationServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    public function provides(): array
    {
        return [AuthServiceInterface::class];
    }
}
