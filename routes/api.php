<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware([\App\Http\Middleware\ApiMiddleware::class])->group(function () {

    Route::get('/ping', function () {
        return response('pong');
    });

    Route::post('/auth', [\App\Http\Controllers\AuthController::class, 'login']);

    Route::middleware([\App\Http\Middleware\ApiAuthentication::class])->group(function () {
        Route::get('/book/{name}',  [\App\Http\Controllers\BooksController::class, 'search']);
        Route::post('/book',  [\App\Http\Controllers\BooksController::class, 'add']);
    });

    Route::any('*', function () {
        return response('Undefined', 404);
    });
});
