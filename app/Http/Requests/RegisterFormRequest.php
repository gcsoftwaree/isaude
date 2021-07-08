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
            'CPF_CNPJ'      => 'bail|required|cpf_ou_cnpj',
            'DT_NASCIMENTO' => 'bail|required|date',
            'NUM_TELEFONE'  => 'bail|required|digits_between:8,9|numeric',
            'COD_DD'        =>  'bail|required|digits_between:2,2|numeric',
            'DS_EMAIL'      => 'bail|required|max:150|email:rfc,dns'

        ];
    }

    public function messages()
    {
        return[
            'NOME_PESSOA.required'          => 'O campo Nome é obrigatório.',
            'DT_NASCIMENTO.required'        => 'O campo Data Nascimento é obrigatório.',
            'CPF_CNPJ.required'             => 'O campo Documento é obrigatório.',
            'CPF_CNPJ.cpf_ou_cnpj'          => 'Por favor digite um CPF ou CNPJ válido.',
            'NOME_PESSOA.max'               => 'Limite de caractéres excedido.',
            'NUM_TELEFONE.digits_between'   => 'Por favor insira um Telefone válido',
            'NUM_TELEFONE.required'         => 'O campo telefone é obrigatório',
            'COD_DD.digits_between'         => 'EX: 61',
            'COD_DD.numeric'                => 'EX: 61',
            'COD_DD.required'               => 'Obrigatório',
            'DS_EMAIL.required'             => 'O campo Email é obrigatório.',
            'DS_EMAIL.email'                => 'Por favor insira um Email válido.',
            'DS_EMAIL.max'                  => 'Limite de caractéres excedido.'
        ];
    }
}
