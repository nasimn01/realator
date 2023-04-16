<?php

namespace App\Http\Requests\creview;

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
            'review'=>'string|max:160|nullable',
        ];
    }

    public function messages(){
        return [
            'review.string' => 'Review Message must be a string.',
            'review.max' => 'Review Message may not be greater than 160 characters long.',
        ];
    }
}
