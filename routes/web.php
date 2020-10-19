<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RealisationController;

Route::get('/', [PageController::class, 'getIndex']);
Route::get('/a-propos', [PageController::class, 'getAPropos']);
Route::get('/contact', [PageController::class, 'getContact']);
Route::get('/realisations/{url}', [RealisationController::class, 'get']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
