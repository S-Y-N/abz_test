<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','string','max:256']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Заповніть поле',
        ];
    }
}
