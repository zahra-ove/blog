<?php

use Illuminate\Support\Facades\Route;

Route::name('blog.api.')
    ->prefix('v1')
    ->namespace('\App\Http\Controllers\api\v1')
    ->group(function () {
        Route::apiResource('categories', 'CategoryController');
    });
