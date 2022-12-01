<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTorneoRequest extends FormRequest
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
            'nombreTorneo'        => ['required', 'string', 'max:255'],
            'numeroParticipantes' => ['required', 'integer', 'min:2'],
            'fechaInicioRegistro' => ['required', 'date'],
            'fechaFinRegistro'    => ['required', 'date', 'after:fechaInicioRegistro'],
        ];
    }
}
