<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::middleware('guest')->group(function () {
    Route::get('/home', function () {
        return Inertia::render('home');
    })->name('home');

    Route::get('/', function () {
        return Inertia::render('home');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
