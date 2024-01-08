<?php

namespace App\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'country_id'=>['required','int','min:1'],
            'name'=>['required','string','max:256'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Заповніть поле',
        ];
    }
}
