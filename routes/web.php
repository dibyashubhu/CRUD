<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Middleware\ValidUser;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikeController;

use App\Http\Controllers\BlogController;

Route::view('/','welcome');

// Route::resource('blogs', BlogController::class);
Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
// Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('blogs/{blog}/show', [BlogController::class, 'show'])->name('blogs.show');
Route::get('blogs/contact', [BlogController::class, 'contact'])->name('blogs.contact');


Route::middleware([ValidUser::class])->group(function () {
    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');

});

Route::post('/comments/{comment}/like', [CommentLikeController::class, 'toggle'])->name('comments.like');




Route::get('/contact',[BlogController::class,'contact']);

Route::get('send-email',[ContactController::class,'sendEmail']);
Route::post('send-email',[ContactController::class,'sendEmail']);

Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'login']);


Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register']);

Route::get('/logout',[AuthController::class,'logout']);
