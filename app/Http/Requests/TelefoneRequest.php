<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TelefoneRequest extends Request
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

    public function messages()
    {
        return [
            'titulo.required'=> 'Preencha um titulo para o telefone',
            'titulo.max'=> 'Título deve ter até 255 caracteres',
            'telefone.required'=> 'Preencha um número de telefone'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'=> 'required|max:255',
            'telefone'=> 'required'
        ];
    }
}
