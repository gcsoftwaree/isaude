<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetFormRequest extends FormRequest
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
            'DS_EMAIL' => 'bail|required|email|exists:TB_GLB_PESSOA_EMAIL',
            'DS_SENHA'      => [
                'confirmed',
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'DS_SENHA_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'DS_EMAIL.required'                 => 'O campo Email é obrigatório.',
            'DS_EMAIL.email'                   => 'Por favor insira um Email válido.',
            'DS_EMAIL.exists'                   => 'Este Email não está cadastro no sistema.',
            'DS_SENHA.required'                 => 'O campo Senha é obrigatório.',
            'DS_SENHA.confirmed'                => 'As senhas não são iguais.',
            'DS_SENHA_confirmation.required'    => 'O campo Senha é obrigatório.',
            'DS_SENHA.min'                      => 'A senha deve conter no minimo 8 caractéres.',
            'DS_SENHA.regex'                    => 'Formato de senha Inválido. Ex:12345aA@'


        ];
    }
}
