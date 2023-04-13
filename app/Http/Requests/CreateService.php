<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateService extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'header' => 'required|string|max:255',
            'body' => 'required|string|max:1000',
            'min_price' => 'required|integer',
            'max_price' => 'required|integer',
            'city' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'header:max' => 'Слишом длинный заголовок',
            'header:required' => 'Введите заголовок',
            'body:max' => 'Слишом длинный заголовок',
            'body:required' => 'Введите описание',
            'min_price:required' => 'Введите минимальную цену',
            'min_price:integer' => 'Цена должна быть целым числом',
            'max_price:required' => 'Введите максимальную цену',
            'max_price:integer' => 'Цена должна быть целым числом',
            'city:required' => 'Введите город заказа',
        ];
    }
}
