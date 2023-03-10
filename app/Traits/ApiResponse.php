<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponse {
    protected function errorResponse($message, $errors, $code)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'result' => $errors
        ], $code);
    }
}
