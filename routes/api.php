<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'auth'
], function() {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::apiResource('categories', App\Http\Controllers\Api\CategoryAPIController::class);

    Route::get('/services', [App\Http\Controllers\Api\ServiceAPIController::class, 'index']);
    
});
