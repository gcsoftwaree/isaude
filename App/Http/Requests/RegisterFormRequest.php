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
            'CPF_CNPJ'      => 'bail|required|cpf_ou_cnpj|unique:tb_glb_pessoa,CPF_CNPJ',
            'DT_NASCIMENTO' => 'bail|required|date',
            'NUM_TELEFONE'  => 'bail|required|between:14,16',
            'DS_EMAIL'      => 'bail|required|max:150|email:rfc,dns|unique:TB_GLB_PESSOA_EMAIL,DS_EMAIL',
            'DS_SENHA'      => [
                                'required',
                                'string',
                                'min:8',             // must be at least 10 characters in length
                                'regex:/[a-z]/',      // must contain at least one lowercase letter
                                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                                'regex:/[0-9]/',      // must contain at least one digit
                                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ];
    }

    public function messages()
    {
        return[
            'NOME_PESSOA.required'          => 'O campo Nome é obrigatório.',
            'DT_NASCIMENTO.required'        => 'O campo Data Nascimento é obrigatório.',
            'CPF_CNPJ.required'             => 'O campo Documento é obrigatório.',
            'CPF_CNPJ.cpf_ou_cnpj'          => 'Por favor digite um CPF ou CNPJ válido.',
            'CPF_CNPJ.unique'               => 'Já existe um usuário com os dados informados. Use a opção de recuperar senha de acesso.',
            'NOME_PESSOA.max'               => 'Limite de caractéres excedido.',
            'NUM_TELEFONE.between'          => 'Por favor insira um Telefone válido',
            'NUM_TELEFONE.required'         => 'O campo telefone é obrigatório',
            'DS_EMAIL.required'             => 'O campo Email é obrigatório.',
            'DS_EMAIL.email'                => 'Por favor insira um Email válido.',
            'DS_EMAIL.max'                  => 'Limite de caractéres excedido.',
            'DS_EMAIL.unique'               => 'Já existe um usuário com os dados informados. Use a opção de recuperar senha de acesso.',
            'DS_SENHA.required'             => 'O campo Senha é obrigatório.',
            'DS_SENHA.min'                  => 'A senha deve ter no minimo 8 caracteres.',
            'DS_SENHA.regex'                => 'Formato de senha inválido. Ex:12345aA@'
        ];
    }
}
