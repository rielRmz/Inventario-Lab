<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoEquipoRules extends FormRequest
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
            'tipoEquipo_id' => 'required|min:4|max:12',
            'tipoEquipo' => 'required|min:10|max:80'
        ];
    }
}
