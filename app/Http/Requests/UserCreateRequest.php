<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends ApiRequest
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
            'name'          => 'required|string|min:1|max:64',
            'login'         => 'required|string|min:1|max:64',
            'password'      => 'required|string|min:1|max:64',
            'email'         => 'required|email|min:1|max:64',
            'number'        => 'required|string|min:1|max:64',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'name.max' => 'Поле "Имя" должно содержать не более :max символов.',

            'login.required' => 'Поле "Логин" обязательно для заполнения.',
            'login.min' => 'Поле "Логин" должно содержать не менее :min символов.',
            'login.max' => 'Поле "Логин" должно содержать не более :max символов.',
            'login.unique' => 'Такой "Логин" уже существует.',

            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.min' => 'Поле "Пароль" должно содержать не менее :min символов.',
            'password.max' => 'Поле "Пароль" должно содержать не более :max символов.',

            'email.required' => 'Поле "Электронная почта" обязательно для заполнения.',
            'email.email' => 'Поле "Электронная почта" должно быть действительным адресом электронной почты.',
            'email.min' => 'Поле "email" должно содержать не менее :min символов.',
            'email.max' => 'Поле "Электронная почта" должно содержать не более :max символов.',
            'email.unique' => 'Такая "Электронная почта" уже существует.',

            'number.required' => 'Поле "Телефон" обязательно для заполнения.',
            'number.integer' => 'Поле "Телефон" должно быть целым числом.',
            'number.digits_between' => 'Поле "Телефон" должно содержать от :min до :max цифр.',
            'number.unique' => 'Такой "Телефон" уже существует.',
        ];
    }
}
