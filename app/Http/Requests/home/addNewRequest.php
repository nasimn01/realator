<?php

namespace App\Http\Requests\home;

use Illuminate\Foundation\Http\FormRequest;

class addNewRequest extends FormRequest
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
            'title1'=>'string|min:32|max:64|nullable',
        ];
    }

    public function messages(){
        return [
            'string' => "The :attribute filed character must be between 32 to 64",
            'required' => "The :attribute filed is required",
            'unique' => "This :attribute is already used. Please try another",
        ];
    }
}
