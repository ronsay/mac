<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RealisationController;

Route::get('/', [PageController::class, 'getIndex']);
Route::get('/a-propos', [PageController::class, 'getAPropos']);
Route::get('/contact', [PageController::class, 'getContact']);
Route::get('/realisations/{url?}', [RealisationController::class, 'get'])->where('url', '(.*)');
Route::get('/sitemap', [PageController::class, 'sitemap']);
Route::get('/manifest', [PageController::class, 'manifest']);

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'getIndex']);
    Route::get('/{id}', [AdminController::class, 'getGallery']);
    Route::get('/status/{id}', [GalleryController::class, 'getStatus']);
    Route::put('/{id}', [GalleryController::class, 'update']);
    Route::post('/{id}', [GalleryController::class, 'addPhoto']);
    Route::delete('/{id}/photos', [GalleryController::class, 'deletePhotos']);
});
