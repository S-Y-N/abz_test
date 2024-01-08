<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'gender_id'=>['required','numeric','min:1','max:2'],
            'city_id'=>['required','numeric','min:1'],
            'position_id'=>['required','numeric','min:1'],
            'first_name'=>['required','string','max:128'],
            'middle_name'=>['required','string','max:128'],
            'last_name'=>['required','string','max:128'],
            'email'=>['required','email','unique:users','max:128'],
            'password'=>['required','string','max:128'],
            'phone'=>['required','string','max:16'],
            'photo'=>['image','mimes:jpeg,png,jpg','max:5120'],
            'birth_day'=>['required','date']
        ];
    }
    public function messages()
    {
        return[
            'first_name.required'=>'Заповність поле імені',
            'first_name.string'=>'Ім\'я повинно бути строкою',
            'last_name.required'=>'Заповність поле прізвища',
            'last_name.string'=>'Ім\'я повинно бути строкою',
            'email.required'=>'Заповніть це поле',
            'email.string'=>'Пошта повинна бути строкою',
            'email.email'=>'Ваш email повиннен бути в форматі test@test.com',
            'email.unique'=>'Користувач з таким email вже існує',
            'photo.max'=>"Фото важить більше 5 Мб"
        ];
    }
}
