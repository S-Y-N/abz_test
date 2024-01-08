<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $countries = Country::all();
        return view('country.index',compact('countries'));
    }
}
