<?php

namespace App\Http\Controllers\Entrenador;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\StoreEntrenadorRequest;
use App\Models\Entrenador;
use App\Models\Torneo;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthController extends Controller
{
    public function store(StoreEntrenadorRequest $request)
    {
        /** @var Torneo $torneo */
        $torneo = Torneo::query()->withCount('entrenadores')->firstOrFail();

        // if (!Carbon::now()->between($torneo->fechaInicioRegistro, $torneo->fechaFinRegistro)) {
        //     throw new HttpException(Response::HTTP_FORBIDDEN, 'El registro ya no está disponible');
        // }

        if ($torneo->numeroParticipantes == $torneo->entrenadores_count) {
            throw new HttpException(Response::HTTP_FORBIDDEN, 'El torneo ya está lleno');
        }

        try {
            DB::beginTransaction();

            /** @var Entrenador $entrenador */
            $entrenador = $torneo->entrenadores()->create([
                'nombre'          => $request->input('nombre'),
                'apellidoPaterno' => $request->input('apellidoPaterno'),
                'apellidoMaterno' => $request->input('apellidoMaterno'),
                'correo'          => $request->input('correo'),
                'fechaNacimiento' => $request->input('fechaNacimiento'),
                'activo'          => Status::ACTIVO,
            ]);

            $entrenador->pokemones()->createMany($request->input('pokemones'));

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw new HttpException(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ocurrió un error al registrar al entrenador');
        }

        return $entrenador;
    }
}
