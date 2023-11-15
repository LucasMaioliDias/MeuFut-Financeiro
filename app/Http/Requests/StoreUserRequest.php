<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|between:3,100",
            "email" => "required|email:rfc,dns|unique:users,email",
            "password" => "required|between:3,100|confirmed",
            "password_confirmation" => "required|between:3,100",

        ];
    }

    /**
     * Get error message for the defined validation rules
     * 
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.between' => 'Nome deve ter de 3 a 100 letras',
            'email.required' => 'Email é obrigatorio',
            'email.email' => 'Email deve ser válido',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'Senha é obrigatório',
            'password.between' => 'Senha deve ter de 3 a 100 letras',
            'password_confirmation.required' => 'Confirmar a senha é obrigatório',
            'password_confirmation.between' => 'Senha deve ter de 3 a 100 letras',
        ];
    }
}
