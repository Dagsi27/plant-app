<?php

use App\Http\Controllers\PlantController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\WateringHistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/api/get_crsf', function () {
    if (config('app.env') === 'local') {
        return csrf_token();
    }
    throw new Exception('CSRF token not available in production');
});

Route::resource('api/plants', PlantController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);

Route::resource('api/species', SpeciesController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);

Route::resource('watering-histories', WateringHistoryController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);
