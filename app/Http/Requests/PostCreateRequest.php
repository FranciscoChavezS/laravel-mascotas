<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'foto' => 'required',
            'fecha' => 'required',
            'telefono' => 'required',
            'raza' => 'required',
            'comentario' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'El campo nombre es requerido',
            'foto.required' => 'El campo foto es requerido',
            'fecha.required' => 'El campo fecha es obligatorio',
            'telefono.required' => 'El campo telefono es requerido',
            'raza.required' => 'El campo raza es requerido',
            'comentario.required' => 'El campo comentario es requerido'
        ];
    }
}
