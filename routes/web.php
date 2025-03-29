<?php

use App\Http\Controllers\PlantController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\WateringHistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('plants', PlantController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);

Route::resource('species', SpeciesController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);

Route::resource('watering-histories', WateringHistoryController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);
