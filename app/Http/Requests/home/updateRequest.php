<?php

namespace App\Http\Requests\home;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'title1'=>'string|min:8|max:12|nullable',
            'title2'=>'string|min:15|max:20|nullable',
            'title3'=>'string|min:8|max:12|nullable',
        ];
    }

    public function messages(){
        return [
            'title1.string' => 'Title 1 must be a string.',
            'title1.min' => 'Title 1 must be at least 8 characters long.',
            'title1.max' => 'Title 1 may not be greater than 12 characters long.',
            'title2.string' => 'Title 2 must be a string.',
            'title2.min' => 'Title 2 must be at least 15 characters long.',
            'title2.max' => 'Title 2 may not be greater than 20 characters long.',
            'title3.string' => 'Title 3 must be a string.',
            'title3.min' => 'Title 3 must be at least 8 characters long.',
            'title3.max' => 'Title 3 may not be greater than 12 characters long.',
        ];
    }
}
