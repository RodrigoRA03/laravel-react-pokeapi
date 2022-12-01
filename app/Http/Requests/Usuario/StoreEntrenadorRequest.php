<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntrenadorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public static function rules()
    {
        return [
            'nombre'                    => ['string', 'max:255', 'required'],
            'apellidoPaterno'           => ['string', 'max:255', 'required'],
            'apellidoMaterno'           => ['string', 'max:255', 'required'],
            'correo'                    => ['email', 'max:255', 'required', 'unique:entrenadors,correo'],
            'fechaNacimiento'           => ['required', 'date'],
            'torneo_id'                 => ['required', 'exists:torneos,id'],
            //
            'pokemones'                 => ['required', 'array', 'min:1', 'max:6'],
            'pokemones.*.pokemon_id'    => ['required', 'integer', 'min:1'],
            'pokemones.*.nombrePokemon' => ['required', 'string'],
            'pokemones.*.hp'            => ['required', 'integer', 'min:1', 'max:255'],
            'pokemones.*.ataque'        => ['required', 'integer', 'min:1', 'max:255'],
            'pokemones.*.defensa'       => ['required', 'integer', 'min:1', 'max:255'],
            'pokemones.*.velocidad'     => ['required', 'integer', 'min:1', 'max:255'],
        ];
    }
}
