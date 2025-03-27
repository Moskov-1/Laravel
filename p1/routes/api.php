<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', [PostController::class,'index'])->name('api.index');
Route::post('/', [PostController::class,'store'])->name('api.store');
Route::get('/{post}', [PostController::class,'show'])->name('api.show');
