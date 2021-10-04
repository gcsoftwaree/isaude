<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class physicalFormRequest extends FormRequest
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
            'NOME_PESSOA'               => 'bail|max:200',
            'CPF_CNPJ'                  => 'bail|cpf_ou_cnpj',
            'DT_NASCIMENTO'             => 'bail|required|date',
            'NUM_TELEFONE'              => 'bail|required|between:14,16',
            'DS_EMAIL'                  => 'bail|max:150|email:rfc,dns',
            'NOME_MAE'                  => 'bail|required',
            'NOME_PAI'                  => 'bail|required',
            'COD_TIPO_GENERO'           => 'bail|required',
            'COD_ESTADO_CIVIL'          => 'bail|required',
            'COD_NIVEL_ESCOLARIDADE'    => 'bail|required'
        ];
    }

    public function messages()
    {
        return[
            'NOME_PESSOA.required'             => 'O campo Nome é obrigatório.',
            'NOME_PESSOA.max'                  => 'Limite de caractéres excedido.',
            'CPF_CNPJ.required'                => 'O campo Documento é obrigatório.',
            'CPF_CNPJ.cpf_ou_cnpj'             => 'Por favor digite um CPF ou CNPJ válido.',
            'CPF_CNPJ.unique'                  => 'Já existe um usuário com os dados informados. Use a opção de recuperar senha de acesso.',
            'DT_NASCIMENTO.required'           => 'O campo Data Nascimento é obrigatório.',
            'NUM_TELEFONE.between'             => 'Por favor insira um Telefone válido',
            'NUM_TELEFONE.required'            => 'O campo telefone é obrigatório',
            'DS_EMAIL.required'                => 'O campo Email é obrigatório.',
            'DS_EMAIL.email'                   => 'Por favor insira um Email válido.',
            'DS_EMAIL.max'                     => 'Limite de caractéres excedido.',
            'DS_EMAIL.unique'                  => 'Já existe um usuário com os dados informados. Use a opção de recuperar senha de acesso.',
            'NOME_MAE.required'                => 'O campo Nome Mãe é obrigatório.',
            'NOME_PAI.required'                => 'O campo Nome Pai é obrigatório.',
            'COD_TIPO_GENERO.required'         => 'O campo Genêro é obrigatório.',
            'COD_ESTADO_CIVIL.required'        => 'O campo Estado CívilEmail é obrigatório.',
            'COD_NIVEL_ESCOLARIDADE.required'  => 'O campo Escolaridade é obrigatório.',
        ];
    }
}
