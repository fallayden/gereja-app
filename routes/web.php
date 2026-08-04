<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WartaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');

Route::prefix('warta-jemaat')->name('warta.')->group(function () {
    Route::get('/', [WartaController::class, 'index'])->name('index');
    Route::get('/{slug}', [WartaController::class, 'show'])->name('show');
});

Route::prefix('pedang-roh')->name('pedang-roh.')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('index');
});
