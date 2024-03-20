<?php

use Api\Handlers\GetHotelsHandler;
use Api\Handlers\GetRoomsByHotelHandler;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'hotel'], function (){
    Route::get('/', GetHotelsHandler::class);
    Route::get('/{id}/rooms', GetRoomsByHotelHandler::class);
});
