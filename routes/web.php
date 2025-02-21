<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\VisitorCounter;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->middleware('visitor-counter');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->withoutMiddleware('verified');

    Route::resource('post', PostController::class)->only(['index', 'create', 'edit']);
    Route::resource('user', UserController::class)->only(['index', 'create', 'edit']);
});

require __DIR__.'/auth.php';
