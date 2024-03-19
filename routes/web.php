<?php

use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'hotel'], function (){
    Route::get('/',[HotelController::class, 'index'])->name('list.hotel');
    Route::get('/create', [HotelController::class, 'create'])->name('create.hotel');
    Route::get('/edit/{id}', [HotelController::class, 'edit'])->name('edit.hotel');
});
