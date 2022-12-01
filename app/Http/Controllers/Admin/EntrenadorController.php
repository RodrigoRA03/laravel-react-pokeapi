<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entrenador;

class EntrenadorController extends Controller
{
    public function index()
    {
        return Entrenador::all();
    }

    public function indexPorTorneo($torneo_id)
    {
        $paginateData = Entrenador::query()->with('torneo')->whereHas('torneo', function ($query) use ($torneo_id) {
            $query->where('torneos.id', $torneo_id);
        })->paginate();

        $paginateData->each(function ($entrenador) {
            $entrenador->pokemones = $entrenador->pokemones()->inRandomOrder()->limit(3)->get();
        });

        return $paginateData;
    }

    public function show($id)
    {
        return Entrenador::with('pokemones')->findOrFail($id);
    }
}
