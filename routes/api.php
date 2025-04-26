<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

// Public routes
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('books', BookController::class);
    Route::apiResource('transactions', TransactionController::class);
    
    // Additional routes for borrowing/returning books
    Route::post('/books/{book}/borrow', [TransactionController::class, 'borrow']);
    Route::post('/transactions/{transaction}/return', [TransactionController::class, 'returnBook']);
});