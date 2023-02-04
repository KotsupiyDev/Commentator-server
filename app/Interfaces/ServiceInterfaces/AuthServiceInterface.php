<?php

namespace App\Interfaces\ServiceInterfaces;

use App\DTO\UserDTO;

interface AuthServiceInterface
{
    public function registration(UserDTO $user): array;
}
