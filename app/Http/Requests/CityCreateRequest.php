<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'required|min:3|max:200',
            'slug' => 'max:200',
            'description' =>'string|max:10000|min:5',
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'name.required' => 'Введите заголовок статьи',
            'description.min' => 'Минимальная длина статьи [:min] символов',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
        ];
    }
}
