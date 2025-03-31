<?php

use App\Http\Controllers\PlantController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\WateringHistoryController;
use Illuminate\Support\Facades\Route;

Route::post('/api/plants', [PlantController::class, 'store']);
Route::get('api/plants', [PlantController::class, 'index']);
Route::get('api/plants/{id}', [PlantController::class, 'show']);
Route::put('api/plants/{id}', [PlantController::class, 'update']);
Route::delete('api/plants/{id}', [PlantController::class, 'destroy']);

Route::resource('api/species', SpeciesController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);

Route::resource('watering-histories', WateringHistoryController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);
