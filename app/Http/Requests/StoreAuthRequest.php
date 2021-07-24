<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthRequest extends FormRequest
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
            'user' => 'required|cpf',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'O campo Usuário é Obrigatório!',
            'user.cpf' => 'O campo Usuário não é um CPF válido!',
            'password.required' => 'O campo Senha é Obrigatório!',
        ];
    }
}
