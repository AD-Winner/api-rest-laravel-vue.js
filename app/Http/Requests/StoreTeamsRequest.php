<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamsRequest extends FormRequest
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
            //
            'name' => 'required|max:50|unique:teams|min:2',
            'country' => 'required|max:100|min:2',
            'foundation_year' => 'required|max:2021|min:1800|integer'
        ];
         
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatorio',
            'name.max' => 'O tamanho maximo do nome é 50 caractere',
            'name.min' => 'O tamanho minimo do nome é 2 caractere',
            'name.unique' => 'O nome  de time ja esta cadastrado',
            'country.required' => 'O campo pais é obrigatorio',
            'country.max' => 'O tamanho maximo do pais é 100 caractere',
            'country.min' => 'O tamanho minimo do pais é 2 caractere',
            'foundation_year.required' => 'O campo fundação é obrigatorio',
            'foundation_year.max' => 'O  ano maximo é 2021',
            'foundation_year.min' => 'O  ano minimo é 1800',
            'foundation_year.integer' => 'O  ano deve ser inteiro ',
            
        ];
    }
}
