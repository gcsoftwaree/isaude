<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'DS_PEDIDO_TAG' => 'required',
            'DS_PEDIDO' => 'required',
            'files' =>'required',
            'files.*' => 'required|mimes:pdf,doc,jpg,jpeg,png,bmp,gif,svg,webp|max:15360',
        ];
    }

    public function messages()
    {
        return[
            'DS_PEDIDO_TAG.required' => 'Campo Titulo Obrigatório',
            'DS_PEDIDO.required' => 'Campo Pedido Obrigatório',
            'files.*.mimes' => 'Apenas pdf, doc, jpg, jpeg, png, bmp, gif, svg, webp são permitidos.',
            'files.*.max' => 'Tamanho de anexo superior ao permitido. O tamanho máximo é de 15mb.'

        ];
    }
}
