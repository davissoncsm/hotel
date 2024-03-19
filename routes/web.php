<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'hotel'], function (){
    Route::get('/',[HotelController::class, 'index'])->name('list.hotel');
    Route::get('/create', [HotelController::class, 'create'])->name('create.hotel');
    Route::get('/edit/{id}', [HotelController::class, 'edit'])->name('edit.hotel');
});

Route::group(['prefix' => 'room'], function (){
    Route::get('/hotel/{id}',[RoomController::class, 'index'])->name('list.rooms');
    Route::get('/create/hotel/{id}', [RoomController::class, 'create'])->name('create.room');
    Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('edit.room');
});
