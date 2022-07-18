<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Route;

// Route for authentication
Route::post("/login", [AuthController::class, 'login']);
Route::post("/register", [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post("/logout", [AuthController::class, 'logout']);
});

// Post Route
Route::get("/posts/search", [PostController::class, 'searchPost'])->middleware('auth:sanctum');
Route::apiResource('/posts', PostController::class)->middleware('auth:sanctum');

// Category Route
Route::apiResource('/categories', PostCategoryController::class)->except(['show'])->middleware('auth:sanctum');

// Profile Route
Route::prefix('/profile')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
});
