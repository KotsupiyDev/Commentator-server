<?php

namespace App\Interfaces\ServiceInterfaces;

use App\DTO\UserDTO;
use App\Http\Resources\UserResource;

interface AuthServiceInterface
{
    public function registerUser(UserDTO $user): UserResource;

    public function loginUser(UserDTO $user): UserResource;
}
