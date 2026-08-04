<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/tentang', function () {
    return view('welcome');
})->name('about');

Route::prefix('warta-jemaat')->name('warta.')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('index');
});

Route::prefix('pedang-roh')->name('pedang-roh.')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('index');
});
