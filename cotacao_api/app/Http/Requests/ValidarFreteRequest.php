<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarFreteRequest extends FormRequest
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
            'uf' => 'required',
            'valor_pedido' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'uf.required' => 'O campo UF é obrigatório.',
            'valor_pedido.required' => 'O campo Valor pedido é obrigatório.'
        ];
    }
}
