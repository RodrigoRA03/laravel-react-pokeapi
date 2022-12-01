<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\StoreEntrenadorRequest;
use App\Models\Torneo;

class UsuarioController extends Controller
{

    public function store(StoreEntrenadorRequest $request)
    {
//        $torneo = Torneo::query()->firstOrFail($request->input('torneo_id'));
        return Torneo::query()->first();


//        $usuario = Usuario::create([
//            'nombre'          => $request->input('nombre'),
//            'apellidoPaterno' => $request->input('apellidoPaterno'),
//            'apellidoMaterno' => $request->input('apellidoMaterno'),
//            'correo'          => $request->input('correo'),
//            'fechaNacimiento' => $request->input('fechaNacimiento'),
//            'activo'          => Status::ACTIVO,
//        ]);
    }
}
