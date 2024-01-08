<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\UpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Country $country)
    {
        $data = $request->validated();
        $country->update($data);
        return redirect()->route('country.index');
    }
}
