<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VideoVController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generate-video-url/{id}', [VideoVController::class, 'generateVideoUrl'])->name('generate.video.url');
Route::get('/secure-video', [VideoVController::class, 'serveVideo'])->name('secure.video');
