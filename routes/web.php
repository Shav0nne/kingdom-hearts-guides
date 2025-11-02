<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// Public guide routes
Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/guides/create', [GuideController::class, 'create'])->name('guides.create');
    Route::post('/guides', [GuideController::class, 'store'])->name('guides.store');
    Route::get('/guides/{guide}/edit', [GuideController::class, 'edit'])->name('guides.edit');
    Route::put('/guides/{guide}', [GuideController::class, 'update'])->name('guides.update');
    Route::delete('/guides/{guide}', [GuideController::class, 'destroy'])->name('guides.destroy');
    Route::patch('/guides/{guide}/toggle', [GuideController::class, 'toggle'])->name('guides.toggle');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/guides/{guide}/like', [LikeController::class, 'toggle'])->name('guides.like');
    Route::post('/guides/{guide}/comment', [CommentController::class, 'store'])->name('guides.comment');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/guides/{guide}', [GuideController::class, 'show'])->name('guides.show');
