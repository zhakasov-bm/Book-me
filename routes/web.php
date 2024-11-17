<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\LectureController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lecture/vue', function () {
    return view('vue');
});

Route::get('/send-email', [\App\Http\Controllers\EmailController::class, 'send']);


