<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/services/{id}', function () {
    return view('pages.service_detail');
});

Auth::routes();

Route::get('/backends', function () {
    return view('backends.dashboard');
})->name('backends.dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
