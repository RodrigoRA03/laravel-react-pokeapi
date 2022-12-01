<?php

namespace App\Http\Requests\UsuarioPokemons;

use Illuminate\Foundation\Http\FormRequest;

class GuardarUsuarioPokemonsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'idUsuario'     => ['integer', 'required', 'exists:usuarios,id'],
            'nombrePokemon' => ['string', 'required', 'max:255'],
            'hp'            => ['integer', 'required', 'min:1'],
            'ataque'        => ['integer', 'required', 'min:1'],
            'defensa'       => ['integer', 'required', 'min:1'],
            'velocidad'     => ['integer', 'required', 'min:1'],
        ];
    }
}
