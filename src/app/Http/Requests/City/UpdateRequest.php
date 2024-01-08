<?php

namespace App\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'country_id'=>['nullable','int','min:1'],
            'name'=>['nullable','string','max:256'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Заповніть поле',
        ];
    }
}
