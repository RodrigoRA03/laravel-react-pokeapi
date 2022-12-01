<?php

use App\Http\Controllers\Admin\TorneosController;
use Illuminate\Support\Facades\Route;

Route::post('/', [TorneosController::class, 'store']);
