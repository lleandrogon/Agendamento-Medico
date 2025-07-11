<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'date' => 'required|date',
            'time' => 'required',
            'specialty' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Data é obrigatória!',
            'time.required' => 'Horário é obrigatório!',
            'specialty.required' => 'Especialidade é obrigatória!'
        ];
    }
}
