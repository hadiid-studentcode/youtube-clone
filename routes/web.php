<?php

use App\Http\Controllers\KontenController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchController;
use App\Models\Person;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Person $person) {
    $isLogin = auth()->check();

    if ($isLogin) {
        $person = $person->getPersonFirst(auth()->user()->id_person);

    }

    $resultVideos = new Video();
    $videos = $resultVideos->getVideos();

    return view('welcome', [
        'title' => env('APP_NAME'),
        'isLogin' => $isLogin,
        'videos' => $videos,
        'person' => $person,
    ]);
})->name('login');
Route::get('/watch/{url}', [WatchController::class, 'Watch'])->name('watch.show');
Route::get('/watch/like/{url}', [WatchController::class, 'like'])->name('watch.like');
Route::get('/watch/dislike/{url}', [WatchController::class, 'dislike'])->name('watch.dislike');
Route::post('/watch/komentar/{url}', [WatchController::class, 'komentar'])->name('watch.komentar');


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
