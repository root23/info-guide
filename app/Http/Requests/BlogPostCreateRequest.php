<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostCreateRequest extends FormRequest
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
            'title' =>'required|min:3|max:200|unique:blog_posts',
            'slug' => 'max:200',
            'content_raw' =>'string|max:10000|min:5',
            'category_id' => 'required|integer|exists:blog_categories,id',
            'img' => 'file|mimes:png,jpg,jpeg',
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'title.required' => 'Введите заголовок статьи',
            'content_raw.min' => 'Минимальная длина статьи [:min] символов',
        ];
    }

    public function attributes()
    {
        return [
          'title' => 'Заголовок',
        ];
    }
}
