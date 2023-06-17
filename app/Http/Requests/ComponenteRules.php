<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponenteRules extends FormRequest
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
            'No_Serie' => 'required|min:10|max:50',
            'descripcion' => 'required|min:10|max:80',
            'estatus_id' => 'required',
            'marca_id' => 'required',
            'tipoComponente_id' => 'required|min:3|max:12'
        ];
    }
}
