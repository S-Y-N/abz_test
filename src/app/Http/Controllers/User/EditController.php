<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Gender;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $cities = City::all();
        $genders = Gender::all();

        return view ('user.edit',compact('user','cities','genders'));
    }
}
