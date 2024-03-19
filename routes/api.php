<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'hotel'], function (){
    Route::get('/', [\App\Http\Controllers\HotelController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\HotelController::class, 'edit']);
    Route::post('/', [\App\Http\Controllers\HotelController::class, 'store']);
    Route::put('/{id}', [\App\Http\Controllers\HotelController::class, 'update']);
    Route::delete('/{id}', [\App\Http\Controllers\HotelController::class, 'delete']);
});

Route::group(['prefix' => 'room'], function (){
    Route::get('/', [\App\Http\Controllers\RoomController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\RoomController::class, 'edit']);
    Route::post('/', [\App\Http\Controllers\RoomController::class, 'store']);
    Route::put('/{id}', [\App\Http\Controllers\RoomController::class, 'update']);
    Route::delete('/{id}', [\App\Http\Controllers\RoomController::class, 'delete']);
});
