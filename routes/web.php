<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedangRohController;
use App\Http\Controllers\WartaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');

Route::prefix('warta-jemaat')->name('warta.')->group(function () {
    Route::get('/', [WartaController::class, 'index'])->name('index');
    Route::get('/attachment/{attachment}/download', [WartaController::class, 'downloadAttachment'])->name('download-attachment');
    Route::get('/attachment/{attachment}/view', [WartaController::class, 'viewAttachment'])->name('view-attachment');
    Route::get('/{slug}', [WartaController::class, 'show'])->name('show');
});

Route::prefix('pedang-roh')->name('pedang-roh.')->group(function () {
    Route::get('/', [PedangRohController::class, 'index'])->name('index');
    Route::get('/{magazine}/download', [PedangRohController::class, 'download'])->name('download');
    Route::get('/{magazine}/view', [PedangRohController::class, 'view'])->name('view');
});
