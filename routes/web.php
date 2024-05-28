<?php

use App\Http\Controllers\KontenController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $isLogin = auth()->check();



    return view('welcome', [
        'title' => env('APP_NAME'),
        'isLogin' => $isLogin
    ]);
});


Route::get('/login', [UserController::class, 'index']);
Route::get('/register', [UserController::class, 'register']);


Route::get('/watch/{id}', [WatchController::class, 'Watch'])->name('watch.show');
Route::resource('/studio', StudioController::class);
Route::resource('/konten', KontenController::class);
