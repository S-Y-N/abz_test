<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Country $country)
    {
        $country->delete();
        return redirect()->route('country.index');
    }
}
