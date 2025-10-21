<?php

use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('livewire.auth.register');
})->name('register');

// Protected Routes
// Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    
    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');
    
    Route::get('/settings', function () {
        return view('pages.settings');
    })->name('settings');
    
    Route::get('/users', function () {
        return view('pages.users');
    })->name('users');
    
    Route::get('/help', function () {
        return view('pages.help');
    })->name('help');
// });
