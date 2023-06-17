<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoftwareRules extends FormRequest
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
            'Software_id' => 'required|min:4|max:12',
            'descripcion' => 'required|min:10|max:80',
            'tipoSoftware_id' => 'required|min:2|max:12'
        ];
    }
}
