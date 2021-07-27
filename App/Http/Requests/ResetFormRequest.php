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
            'DS_SENHA' => 'bail|required|confirmed',
            'DS_SENHA_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'DS_EMAIL.required'                 => 'O campo Email é obrigatório.',
            'DS_EMAIL.exists'                   => 'Por favor insira um Email válido.',
            'DS_EMAIL.exists'                   => 'Este Email não está cadastro no sistema.',
            'DS_SENHA.required'                 => 'O campo Senha é obrigatório.',
            'DS_SENHA.confirmed'                => 'A confirmação de Senha está incorreta.',
            'DS_SENHA_confirmation.required'    => 'O campo Senha é obrigatório.'

        ];
    }
}
