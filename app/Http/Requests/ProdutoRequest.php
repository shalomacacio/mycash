<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'categoria_id'      =>  'required',
            'marca_id'          =>  'required',
            'codigo_interno'    =>  'required|numeric|unique:produtos',
            'nome'              =>  'required|min:2|max:255|unique:produtos',
        ];
    }
}
