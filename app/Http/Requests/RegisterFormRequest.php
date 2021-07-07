<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterFormRequest extends FormRequest
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
            'NOME_PESSOA'   => 'bail|required|max:200',
            'TP_PESSOA'     => 'bail|required|max:1|numeric',
            'CPF_CNPJ'      => 'bail|required|numeric|min:11',
            'DT_NASCIMENTO' => 'bail|required|date',
            'DT_CADASTRO'   => 'bail|required|date'
        ];
    }

    public function messages()
    {
            return[
                'NOME_PESSOA.required'  => 'O campo Nome é obrigatório.',
                'NOME_PESSOA.max'       => 'Limite de caractéres excedido no campo Nome',
                'TP_PESSOA.required'    => 'O campo Tipo é obrigatório.',
                'CPF_CNPJ.required'     => 'O campo Documento é obrigatório.',
                'CPF_CNPJ.numeric'      => 'O campo Documento é precisa ser numérico.',
                'CPF_CNPJ.min'          => 'O campo Documento deve ter no minimo 11 caractéres',
                'DT_NASCIMENTO.required'=> 'O campo Data Nascimento é obrigatório.',
                'DT_CADASTRO.required'  => 'O campo Cadastro é obrigatório.'
            ];
    }
}
