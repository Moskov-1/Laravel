<?php

use App\Http\Controllers\AuthProxyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function(){
    return view('index');
});

Route::post('/',[UserController::class,'register']);

// login should be made a named route;
// otherwise error: login method not defined for auth middleware
Route::get('/login',[AuthProxyController::class,'loadLogin'])->name('login');

Route::post('/login',[AuthProxyController::class,'login']);
Route::post('/logout',[AuthProxyController::class,'logout']);

Route::get('all-blog',[BlogController::class,'all'])->name('blog.all');
Route::get('blog/{id}',[BlogController::class,'get'])->name('blog.get');

Route::middleware(['auth'])->group(function(){
    Route::get('write-blog',[BlogController::class,'write'])->name('blog.write');
    Route::post('write-blog',[BlogController::class,'store'])->name('blog.store');
    Route::get('blog-edit/{id}',[BlogController::class,'edit'])->name('blog.edit');

    Route::put('blog-update/{id}',[BlogController::class,'update'])->name('blog.update');

    Route::post('blog-delete/{id}',[BlogController::class,'delete'])->name('blog.delete');
});

