<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController; // Make sure your controller is imported!

Route::get('/', function () {
    return view('welcome');
});

// 1. This loads your pink layout when logged in!
Route::get('/dashboard', function () {
    return view('songs.index'); 
})->middleware(['auth', 'verified'])->name('dashboard');

// 2. This fixes the "Route [songs.create] not defined" error!
Route::middleware('auth')->group(function () {
    Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
    Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
    // Add any edit or delete song routes down here if you have them!
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __important_breeze_auth_routes_here__ // Leave the require __DIR__.'/auth.php'; line at the bottom!