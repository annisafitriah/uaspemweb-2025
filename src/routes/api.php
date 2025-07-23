<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CakeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;

Route::get('/cakes', [CakeController::class, 'index']);
Route::get('/cakes/{id}', [CakeController::class, 'show']);

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::post('/orders', [OrderController::class, 'store']);

Route::get('/order-items', [OrderItemController::class, 'index']);
Route::get('/order-items/{id}', [OrderItemController::class, 'show']);
Route::post('/order-items', [OrderItemController::class, 'store']);
Route::put('/order-items/{id}', [OrderItemController::class, 'update']);
Route::delete('/order-items/{id}', [OrderItemController::class, 'destroy']);
