<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('shoes', ShoeController::class);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected route for logout
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);





Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::delete('/cart/{id}', [CartController::class, 'destroy']);



Route::middleware('auth:sanctum')->group(function () {

    // Place a new order
    Route::post('/orders/place', [OrderController::class, 'placeOrder']);

    // Get orders of logged-in user
    Route::get('/orders', [OrderController::class, 'userOrders']);

    // Update order status (admin or allowed users)
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus']);

});


Route::middleware('auth:sanctum')->group(function () {

    // Add new size
    Route::post('/sizes', [SizeController::class, 'store']);

    // Update size
    Route::put('/sizes/{id}', [SizeController::class, 'update']);

    // Delete size
    Route::delete('/sizes/{id}', [SizeController::class, 'destroy']);

});


?>