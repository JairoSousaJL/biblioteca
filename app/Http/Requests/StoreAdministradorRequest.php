<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdministradorRequest extends FormRequest
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
            'cpfAdministrador' => 'required|cpf|formato_cpf',
        ];
    }

    public function messages()
    {
        return [
            'cpfAdministrador.required' => 'O campo CPF é Obrigatório!',
            'cpfAdministrador.formato_cpf' => 'O formato do CPF está inválido!',
            'cpfAdministrador.cpf' => 'O CPF está inválido!',
        ];
    }
}
