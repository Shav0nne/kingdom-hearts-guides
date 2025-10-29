<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\Guides;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Nyo ho'
    ]);
});

Route::get('/about', function () {
    return view ('about');
});

Route::get('/contact', function () {
    return view ('contact');
});

Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
Route::get('/guides/{guide}', [GuideController::class, 'show'])->name('guides.show');

require __DIR__.'/auth.php';

//auth
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['admin'])->group(function () {
        Route::get('/guides/create', [GuideController::class, 'create'])->name('guides.create');
        Route::post('/guides', [GuideController::class, 'store'])->name('guides.store');
        Route::get('/guides/{guide}/edit', [GuideController::class, 'edit'])->name('guides.edit');
        Route::put('/guides/{guide}', [GuideController::class, 'update'])->name('guides.update');
        Route::delete('/guides/{guide}', [GuideController::class, 'destroy'])->name('guides.destroy');
        Route::patch('/guides/{guide}/toggle', [GuideController::class, 'toggle'])->name('guides.toggle');
    });
});
