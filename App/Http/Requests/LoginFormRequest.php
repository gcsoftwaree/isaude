<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginFormRequest extends FormRequest
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
            'DS_LOGIN' => ['required','cpf_ou_cnpj'],
            'DS_SENHA' => ['required'],
        ];
    }

    public function messages()
    {
        return [
          'DS_LOGIN.required' => 'Por Favor Digite um Usuário',
           'DS_LOGIN.cpf_ou_cnpj' => 'Por Favor Digite um CPF ou CNPJ Válido',
          'DS_SENHA.required' =>  'Por Favor Digite uma Senha'
        ];
    }
}
