<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Interfaces\ServiceInterfaces\AuthServiceInterface;
use App\Models\User;

class AuthService implements AuthServiceInterface
{
    public function registerUser(UserDTO $user): array
    {
        $user->password = $this->encryptPassword($user->password);
        $user = User::create($user->toArray());
        $token = $user->createToken('token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    private function encryptPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
