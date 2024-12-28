<?php

use App\Http\Controllers\GpsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/gps-data', [GpsController::class, 'index']);