<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// Halaman depan (user biasa)
Route::get('/', [DestinationController::class, 'home'])->name('home');

// Halaman daftar destinasi
Route::get('/destinations', [DestinationController::class, 'index'])->name('destination.index');

// Halaman detail destinasi
Route::get('/destination/{slug}', [DestinationController::class, 'show'])->name('destination.show');

Route::get('/search', [DestinationController::class, 'search'])->name('search');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Admin & Dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('destinations', App\Http\Controllers\Admin\DestinationController::class);
    });
});

// Logout
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__ . '/auth.php';

