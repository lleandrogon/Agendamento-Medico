<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'phone_number' => 'required|digits:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório!',
            'name.min' => 'Nome deve ter no mínimo 3 caracteres!',
            'email.required' => 'Email é obrigatório!',
            'email.email' => 'Email inválido!',
            'password.required' => 'Senha é obrigatória',
            'password.min' => 'Senha deve ter no mínimo 5 caracteres!',
            'phone_number.required' => 'Telefone é obrigatório!',
            'phone_number' => 'Telefone deve conter 10 dígitos'
        ];
    }
}
