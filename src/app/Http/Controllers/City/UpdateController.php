<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\UpdateRequest;
use App\Models\City;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, City $city)
    {
        $data = $request->validated();
        $city->update($data);

        return redirect()->route('city.index');
    }
}
