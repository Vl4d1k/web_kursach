<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:3|max:255',
            'phone' => 'required|min:9|max:19',
            'delivery' => 'required',
            'payment' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'delivery.required' => 'Выберите способ доставки.',
            'payment.required' => 'Выберите способ оплаты.',
            'phone.required' => 'Введите номер телефона.',
            'name.required' => 'Введите своё Имя и Фамилию.',
            'min' => 'Поле :attribute должно содержать как минимум :min символа.',
            'max' => 'Поле :attribute должно содержать максимум :max символов.'
        ];
    }
}
