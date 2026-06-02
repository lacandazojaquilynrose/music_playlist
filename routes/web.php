<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userCount = User::count();
    $songCount = \App\Models\Song::count(); 
    
    return view('dashboard', compact('userCount', 'songCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Requirement #4: Added Users CRUD management resource routes under authentication shield
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';

Route::resource('songs', SongController::class)->middleware(['auth']);