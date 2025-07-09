<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeLoginRequest extends FormRequest
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
            'registration' => 'required|max:20',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'registration.required' => 'Preencha sua matrícula!',
            'registration.max' => 'Matrícula deve ter até 20 caracteres!',
            'password.required' =>  'Preencha sua senha!'
        ];
    }
}
