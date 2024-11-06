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

Route::get(
    '/backends/categories', 
    [App\Http\Controllers\Backends\CategoryController::class, 'index']
)->name('backends.categories.index');

Route::get(
    '/backends/categories/create', 
    [App\Http\Controllers\Backends\CategoryController::class, 'create']
)->name('backends.categories.create');

Route::post(
    '/backends/categories', 
    [App\Http\Controllers\Backends\CategoryController::class, 'store']
)->name('backends.categories.store');

Route::get(
    '/backends/categories/{category}', 
    [App\Http\Controllers\Backends\CategoryController::class, 'edit']
)->name('backends.categories.edit');

Route::put(
    '/backends/categories/{category}', 
    [App\Http\Controllers\Backends\CategoryController::class, 'update']
)->name('backends.categories.update');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
