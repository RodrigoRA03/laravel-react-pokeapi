<?php

use App\Http\Controllers\Entrenador\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'store']);
