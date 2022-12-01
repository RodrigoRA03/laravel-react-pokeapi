<?php

use App\Http\Controllers\Entrenador\TorneosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TorneosController::class, 'index']);
