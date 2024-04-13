<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends ApiRequest
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
            'name'        => 'required|string|min:1|max:255',
            'description' => 'required|string|nullable',
            'price'       => ['required', 'numeric', 'min:0', 'regex:/^\d{1,8}(\.\d{1,2})?$/'],
            'amount'    => 'required|integer|min:1',
            'gram' => 'required|numeric|min:0',
            'image'       => 'nullable|file|mimes:jpeg,jpg,png,webp|max:4096',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }
    public function messages()
    {
        return [
            'name.required'       => 'Поле "Name" обязательно для заполнения.',
            'name.max'            => 'Поле "Name" должно содержать не более :max символов.',
            'name.min'            => 'Поле "Name" должно содержать минимум :min символов.',

            'price.required'      => 'Поле "Price" обязательно для заполнения.',
            'price.numeric'       => 'Поле "Price" должно быть числом.',
            'price.min'           => 'Поле "Price" должно быть не менее :min.',
            'price.regex'         => 'Недопустимый формат поля "Price".',

            'quantity.required'   => 'Поле "Quantity" обязательно для заполнения.',
            'quantity.integer'    => 'Поле "Quantity" должно быть целым числом.',
            'quantity.min'        => 'Поле "Quantity" должно быть не менее :min.',

            'image.file'          => 'Поле "Photo" должно быть файлом.',
            'image.mimes'         => 'Поле "Photo" должно быть файлом типа: jpeg, jpg, png, webp.',
            'image.max'           => 'Файл в поле "Photo" должен быть не больше :max килобайт.',

            'category_id.required'=> 'Поле "Categories ID" обязательно для заполнения.',
            'category_id.integer' => 'Поле "Categories ID" должно быть целым числом.',
        ];
    }
}
