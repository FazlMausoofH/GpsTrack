<?php

use App\Http\Controllers\GpsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/gps', [GpsController::class, 'index']);
Route::post('/gps', [GpsController::class, 'create']);
Route::delete('/gps', [GpsController::class, 'delete']);