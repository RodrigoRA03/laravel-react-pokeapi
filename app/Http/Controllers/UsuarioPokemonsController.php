<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioPokemons\GuardarUsuarioPokemonsRequest;
use Illuminate\Http\Request;

class UsuarioPokemonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarUsuarioPokemonsRequest $request)
    {
//        $pokemonsRegistrados = UsuarioPokemons::query()
//            ->where('idUsuario', $request->idUsuario)
//            ->where('activo', 1)
//            ->count();
//        if ($pokemonsRegistrados >= 6) return response()->json(['error' => 'No se puede registrar mas pokemons'], 500);
//        DB::beginTransaction();
//        try {
//            $pokemon = UsuarioPokemons::create([
//                'idUsuario'     => $request->idUsuario,
//                'nombrePokemon' => $request->nombrePokemon,
//                'hp'            => $request->hp,
//                'ataque'        => $request->ataque,
//                'defensa'       => $request->defensa,
//                'velocidad'     => $request->velocidad,
//                'activo'        => 1,
//            ]);
//            if (!$pokemon) throw new \Exception('No se pudo guardar el pokemon');
//            DB::commit();
//            return response()->json(['success' => 'Pokemon guardado correctamente', 'pokemon' => $pokemon], 200);
//        } catch (\Exception $e) {
//            DB::rollBack();
//            return response()->json(['error' => $e->getMessage()], 500);
//        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
