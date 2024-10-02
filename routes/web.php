<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'public.welcome');

Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::view('dashboard', 'pages.dashboard')->name('dashboard');
        Route::view('components', 'pages.components')->name('components');
        Route::view('profile', 'pages.profile')->name('profile');
    });

require __DIR__.'/auth.php';
