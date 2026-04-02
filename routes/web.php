<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'top')->name('home');
Route::view('/maze', 'maze')->name('maze');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
