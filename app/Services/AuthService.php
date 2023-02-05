<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Http\Resources\UserResource;
use App\Interfaces\RepositoryInterfaces\UserRepositoryInterface;
use App\Interfaces\ServiceInterfaces\AuthServiceInterface;
use App\Models\User;
use App\Repositories\UserRepository;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        public UserRepositoryInterface $userRepository
    ) {}

    public function registerUser(UserDTO $user): UserResource
    {
        $user->password = $this->encryptPassword($user->password);
        $user = User::create($user->toArray());

        return new UserResource($user);
    }

    public function loginUser(UserDTO $userDTO): UserResource
    {
        $user = $this->userRepository->getUser($userDTO->email);

        throw_if(is_null($user), new \Exception('User does not have exit.'));

        $isPasswordCorrect = $this->comparePassword($userDTO->password, $user->password);

        throw_if(!$isPasswordCorrect, new \Exception('Wrong password.'));

        return new UserResource($user);
    }

    private function comparePassword(string $password, string $passwordHash): bool
    {
        return password_verify($password, $passwordHash);
    }

    private function encryptPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
