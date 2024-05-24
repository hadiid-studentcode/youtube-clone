<?php

use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome')
    ->with('title','Youtube')
    ;
});

Route::get('/watch/{id}', [WatchController::class, 'Watch'])->name('watch.show');