<?php

use App\Http\Controllers\GuideController;
use Illuminate\Support\Facades\Route;
use App\Models\guide;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view ('about');
});

Route::get('/contact', function () {
    return view ('contact');
});

Route::get('/guide/show', [GuideController::class, 'show']);

Route::get('/login', function () {
    return view ('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [GuideController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [GuideController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [GuideController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
