<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $countries = Country::all();
        return view('city.create',compact('countries'));
    }
}
