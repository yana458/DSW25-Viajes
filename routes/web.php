<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('destinations', DestinationController::class);

Route::resource('activities', ActivityController::class);