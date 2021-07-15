<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            'name' => 'required|string|max:100|min:2',
            'position' => 'required|string|max:50|min:2',
            'number' => 'required|integer|max:100|min:0',
            'country' => 'required|string|max:100|min:2',
            'born_at' => 'date|before:today',
            'team_id' => 'required|integer|exists:teams,id',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatorio',
            'name.max' => 'O tamanho maximo do nome é 50 caractere',
            'name.min' => 'O tamanho minimo do nome é 2 caractere',
            'name.string' => 'O campo nome  deve ser de tipo string',
            'country.required' => 'O campo pais é obrigatorio',
            'country.max' => 'O tamanho maximo do pais é 100 caractere',
            'country.min' => 'O tamanho minimo do pais é 2 caractere',
            'position.max' =>  'O tamanho maximo da position é 100 caractere',
            'position.min' =>  'O tamanho minimo da position é 2 caractere',
            'position.string' => 'O campo posição deve ser do tipo string',
            'number.required' => 'O campo numero é obrigatorio',
            'number.max' => 'O campo numero deve ser ao maximo 100',
            'number.min' => 'O campo numero deve ser ao minimo 0',
            'born_at.date' => 'O campo data de nascimento deve ser anterior ao dia de hoje',
            'team_id.required' => 'O campo time é obrigatorio',
            'team_id.integer' => 'O campo time deve ser do tipo inteiro',
            'team_id.exists' => 'O campo time deve ser equivalente ao id de um time existente',           
        ];
    } 
}
