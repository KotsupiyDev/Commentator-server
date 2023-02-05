<?php

namespace App\Http\Controllers\API\Auth;

use App\DTO\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Interfaces\ServiceInterfaces\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{
    public function __construct(
        public AuthServiceInterface $service
    ) {}

    public function index(RegistrationRequest $request): JsonResponse
    {
        $userDto = UserDTO::from($request->all());

        $response = $this->service->registerUser($userDto);

        return response()->json($response);
    }
}
