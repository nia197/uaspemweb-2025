<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LayananController;
use App\Http\Controllers\Api\ReservasiController;

Route::get('/layanans', [LayananController::class, 'index']);
Route::post('/reservasi', [ReservasiController::class, 'store']);
Route::get('/reservasi', [ReservasiController::class, 'index']); // 👈 tambahkan ini
