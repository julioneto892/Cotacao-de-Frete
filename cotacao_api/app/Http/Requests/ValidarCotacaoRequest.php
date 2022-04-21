<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarCotacaoRequest extends FormRequest
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
            'transportadora_id' => 'required',
            'percentual_cotacao' => 'required',
            'valor_extra' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'uf.required' => 'O campo UF é obrigatório.',
            'transportadora_id.required' => 'O campo Transportadora é obrigatório.',
            'percentual_cotacao.required' => 'O campo Percentual cotação é obrigatório.',
            'valor_extra.required' => 'O campo Valor extra é obrigatório.'
        ];
    }

}
