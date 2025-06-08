<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are typically stateless and are loaded via the API middleware
| group within your application's route service provider.
|
*/

Route::apiResource('products', ProductController::class);
Route::apiResource('orders', OrderController::class);
