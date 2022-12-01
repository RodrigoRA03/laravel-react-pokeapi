<?php

use App\Http\Controllers\Admin\EntrenadorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EntrenadorController::class, 'index']);
Route::get('/torneo/{torneo_id}', [EntrenadorController::class, 'indexPorTorneo']);
Route::get('/{id}', [EntrenadorController::class, 'show']);
