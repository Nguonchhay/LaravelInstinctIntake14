<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('pages.home');

Route::get('/services/{id}', function () {
    return view('pages.service_detail');
});

Auth::routes();

Route::group([
    'prefix' => 'backends',
    'middleware' => ['auth']
], function() {
    Route::get('/', function () {
        return view('backends.dashboard');
    })->name('backends.dashboard');

    Route::group([
        'prefix' => 'categories',
        'middleware' => [App\Http\Middleware\AdminRoleMiddleware::class]
    ], function() {
        Route::get(
            '/', 
            [App\Http\Controllers\Backends\CategoryController::class, 'index']
        )->name('backends.categories.index');

        Route::get(
            '/create', 
            [App\Http\Controllers\Backends\CategoryController::class, 'create']
        )->name('backends.categories.create');

        Route::post(
            '/', 
            [App\Http\Controllers\Backends\CategoryController::class, 'store']
        )->name('backends.categories.store');

        Route::get(
            '/{category}', 
            [App\Http\Controllers\Backends\CategoryController::class, 'edit']
        )->name('backends.categories.edit');
        
        Route::put(
            '/{category}', 
            [App\Http\Controllers\Backends\CategoryController::class, 'update']
        )->name('backends.categories.update');
    });

    Route::resource('/services', App\Http\Controllers\Backends\ServiceController::class, [
        'as' => 'backends'
    ]);
   
    Route::get(
        '/users', 
        [App\Http\Controllers\Backends\UserController::class, 'index']
    )->name('backends.users.index');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
