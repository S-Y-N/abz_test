<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public static function rules(User $user): array
    {
        return [
            'gender_id' => ['nullable', 'numeric', 'min:1', 'max:2'],
            'city_id' => ['nullable', 'numeric', 'min:1'],
            'first_name' => ['nullable', 'string', 'max:128'],
            'middle_name'=> ['nullable', 'string', 'max:128'],
            'last_name' => ['nullable', 'string', 'max:128'],
            'email' => ['nullable', 'email', 'unique:users,email,'.$user->id, 'max:256'],
            'password'=>['nullable','string','max:256'],
            'birth_day'=>['nullable','date']
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
        ];
    }
}
