<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivrosFormRequest extends FormRequest
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
            'nome'=> 'required|max:255',
            'autor'=> 'required|max:255',
            'id_editora'=> 'required',
            'id_tipo'=> 'required',
            'paginas'=> 'max:11',
        ];
    }
}
