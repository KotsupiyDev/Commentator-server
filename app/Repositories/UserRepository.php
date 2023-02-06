<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getUser(string $email): User | null
    {
        return User::where('email', $email)->first();
    }
}
