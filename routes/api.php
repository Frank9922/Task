<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::resource('/task', TaskController::class);

Route::resource('/user', UserController::class);

Route::get('/task-historial/{id}', [TaskController::class, 'historial']);
