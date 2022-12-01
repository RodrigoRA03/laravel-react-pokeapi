<?php

namespace App\Http\Controllers\Entrenador;

use App\Http\Controllers\Controller;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneosController extends Controller
{
    public function index()
    {
        return Torneo::all();
    }
}
