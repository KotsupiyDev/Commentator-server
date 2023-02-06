<?php

namespace App\Http\Controllers\API\Auth;

use App\DTO\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Interfaces\ServiceInterfaces\AuthServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use ApiResponse;

    public function __construct(
        public AuthServiceInterface $service
    ) {}

    public function index(LoginRequest $request)
    {
        try {
            $userDTO = UserDTO::from($request->all());

            $user = $this->service->loginUser($userDTO);

            return response()->json($user);
        }catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 400;

            return $this->errorResponse($message, ['errors' => []], $code);
        }
    }
}
