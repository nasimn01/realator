<?php

namespace App\Http\Requests\preview;

use Illuminate\Foundation\Http\FormRequest;

class addnewRequest extends FormRequest
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
    public function rules()
    {
        return [
            'emailAddress'=>'required|unique:property_reviews,email',
        ];
    }

    public function messages(){
        return [
            'required' => "The :attribute filed is required",
            'unique' => "This :attribute is already used. Please try another",
        ];
    }
}
