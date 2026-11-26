<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShuttleController;
use App\Http\Controllers\Api\LaporanController;

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/service', [PageController::class, 'service']);
Route::resource('shuttles', ShuttleController::class);
Route::get('/export-pdf', [LaporanController::class, 'exportPdf'])->name('export.pdf');