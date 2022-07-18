<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, '__invoke'])->name('show.home')->middleware('auth');

Route::prefix('/login')->group(function () {
    Route::get('/', [Auth\LoginController::class, 'index'])->name('show.login');
    Route::post('/', [Auth\LoginController::class, 'login'])->name('login');
});

Route::prefix('/register')->group(function () {
    Route::get('/', [Auth\RegisterController::class, 'index'])->name('show.register');
    Route::post('/', [Auth\RegisterController::class, 'register'])->name('register');
});

Route::post('/logout', [Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('/profile')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
});

Route::resource('/posts', PostController::class)->except(['index', 'show']);
