<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Country $country)
    {
        return view('country.show',compact('country'));
    }
}
