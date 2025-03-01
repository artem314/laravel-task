<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/user/{user}', 'show');

    Route::post('/user', 'create');

    Route::post('/user/{user}', 'update');

    Route::delete('/user/{user}', 'destroy');
});
