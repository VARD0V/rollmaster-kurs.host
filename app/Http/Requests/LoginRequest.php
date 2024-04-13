<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends ApiRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'number'   => 'required|string|min:1|max:64',
            'password' => 'required|string|max:64',
        ];
    }
    public function messages()
    {
        return [
            'number.required' => 'Поле "number" не может быть пустым.',
            'number.max' => 'Поле "number" не может содержать более :max символов.',
            'number.min' => 'Поле "number" должно содержать не менее :min символов.',

            'password.required' => 'Поле "Password" не может быть пустым.',
            'password.max' => 'Поле "Password" не может содержать более :max символов.',
            'password.min' => 'Поле "password" должен содержать не менее :min символов.',
        ];
    }
}
