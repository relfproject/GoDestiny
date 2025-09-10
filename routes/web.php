<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

// Halaman depan (user biasa)
Route::get('/', [DestinationController::class, 'home'])->name('home');

// Halaman daftar destinasi
Route::get('/destinations', [DestinationController::class, 'index'])->name('destination.index');

// Halaman detail destinasi
Route::get('/destination/{slug}', [DestinationController::class, 'show'])->name('destination.show');

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

