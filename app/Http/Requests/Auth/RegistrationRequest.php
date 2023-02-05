<?php

namespace App\Http\Requests\Auth;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class RegistrationRequest extends FormRequest
{
    use ApiResponse;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $message = 'Validation failed';
        $errors = (new ValidationException($validator))->errors();
        $code = 400;

        throw new HttpResponseException(
            $this->errorResponse($message, ['errors' => $errors], $code)
        );
    }
}
