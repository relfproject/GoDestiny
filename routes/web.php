<?php

use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Halaman depan (user biasa)
Route::get('/', [DestinationController::class, 'home'])->name('home');
Route::get('/destination/{slug}', [DestinationController::class, 'show'])->name('destination.show');

// Admin & Dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard (khusus admin)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD destinasi (admin)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('destinations', AdminDestinationController::class);
    });
});

// Logout route (supaya tidak Not Found)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
require __DIR__.'/auth.php';
