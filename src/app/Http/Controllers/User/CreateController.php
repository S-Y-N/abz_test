<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Gender;
use App\Models\Position;

class CreateController extends Controller
{
    public function __invoke()
    {
        $cities = City::all();
        $positions = Position::all();
        $genders = Gender::all();

        return view ('user.create',compact('cities','genders','positions'));
    }
}
