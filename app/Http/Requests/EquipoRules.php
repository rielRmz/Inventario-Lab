<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoRules extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'No_Serie' => 'required|min:7|max:30',
            'descripcion' => 'required|min:10|max:80',
            'estatus_id' => 'required',
            'contrasena' => 'required|min:7|max:80',
            'marca_id' => 'required',
            'tipoEquipo_id' => 'required|min:4|max:12'
        ];
    }
}
