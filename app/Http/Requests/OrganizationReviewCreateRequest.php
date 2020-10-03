<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationReviewCreateRequest extends FormRequest
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
        return [
            'name' =>'required|min:2|max:30',
            'email' => 'required|email',
            'message' =>'required|max:255|min:3',
            'rating' => 'required|max:5|min:0',
            'recaptcha_response' => 'required|recaptcha',
        ];
    }
}
