<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TourController;
use App\Models\Activity;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('destinations', DestinationController::class);

Route::resource('activities', ActivityController::class);

Route::resource('comments', CommentController::class);

Route::get('/activities/{destination}', [ActivityController::class, 'index'])->name('activities.index');

Route::resource('tours', TourController::class);
Route::post('/tours/{tour}/attach-destination', [TourController::class, 'attachDestination'])->name('tours.attachDestination');