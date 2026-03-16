<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {

        // MODEL NOT FOUND
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan',
                'errors' => null
            ], 404);
        }

        // VALIDATION ERROR
        if ($e instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }

        // ROUTE NOT FOUND
        if ($e instanceof NotFoundHttpException) {
            return response()->json([
                'success' => false,
                'message' => 'Endpoint tidak ditemukan',
                'errors' => null
            ], 404);
        }

        // FALLBACK ERROR
        return response()->json([
            'success' => false,
            'message' => 'Server error',
            'errors' => config('app.debug') ? $e->getMessage() : null
        ], 500);
    }
}
