<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/user', function () {
    return request()->user();
});
