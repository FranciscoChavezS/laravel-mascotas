<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArchivoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_original' => 'required',
            'ruta' => 'required',
            'mime' => 'required',
            'archivo' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'archivo.required' => 'Este campo es requerido'
        ];
    }
}
