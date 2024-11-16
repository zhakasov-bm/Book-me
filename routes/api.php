<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\LectureController;

Route::get('/users', [UserController::class, 'index']);

Route::get('/lectures', [LectureController::class, 'index']);
Route::get('/lectures/{id}', [LectureController::class, 'show']);