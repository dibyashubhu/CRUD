<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\BlogController;

Route::resource('blogs', BlogController::class);
Route::get('/contact',[BlogController::class,'contact']);

Route::get('send-email',[ContactController::class,'sendEmail']);
Route::post('send-email',[ContactController::class,'sendEmail']);
