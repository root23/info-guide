<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxiUpdateRequest extends FormRequest
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
            'title' =>'required|min:3|max:200',
            'description' =>'string|max:10000|min:5',
        ];
    }
}
