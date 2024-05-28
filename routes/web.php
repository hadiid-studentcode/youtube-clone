<?php

use App\Http\Controllers\KontenController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchController;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $isLogin = auth()->check();

    $resultVideos = new Video();
    $videos = $resultVideos->getVideos();

    return view('welcome', [
        'title' => env('APP_NAME'),
        'isLogin' => $isLogin,
        'videos' => $videos,
    ]);
})->name('login');
Route::get('/watch/{url}', [WatchController::class, 'Watch'])->name('watch.show');

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [UserController::class, 'index']);
    Route::post('/login', [UserController::class, 'authenticate']);

    Route::get('/register', [UserController::class, 'register']);
    Route::post('/register', [UserController::class, 'registerStore']);

});

Route::middleware(['auth'])->group(function () {
    Route::resource('/studio', StudioController::class);
    Route::resource('/konten', KontenController::class);
    Route::get('/logout', [UserController::class, 'logout']);

});
