<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'top')->name('home');
Route::view('/maze', 'sandbox/maze')->name('maze');
Route::view('/alpine', 'sandbox/alpine')->name('alpine');
Route::view('/puppy', 'sandbox/puppy')->name('puppy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
