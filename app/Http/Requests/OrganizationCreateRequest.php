<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationCreateRequest extends FormRequest
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
            'title' =>'required|min:3|max:200|unique:organizations',
            'slug' => 'max:200',
            'category_id' => 'required|integer|exists:organization_categories,id',
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'title.required' => 'Введите название организации',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название',
        ];
    }
}
