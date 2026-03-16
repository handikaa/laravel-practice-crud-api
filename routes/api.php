<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

Route::prefix('v1')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/products-trash', [ProductController::class, 'trash']);
    Route::post('/product', [ProductController::class, 'store']);

    // Route::put('/products/{product}', [ProductController::class, 'update']);
    // Route::patch('/products/{product}', [ProductController::class, 'update']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::patch('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::delete('/products/{id}/force', [ProductController::class, 'forceDelete']);
    Route::post('/products/{id}/restore', [ProductController::class, 'restore']);
});
