<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(City $city)
    {
        $countries = Country::all();
        return view('city.edit', compact('countries','city'));
    }
}
