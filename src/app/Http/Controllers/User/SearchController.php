<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\SearchController as Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        return $this->handleSearch(
            $request,
            DB::table('users')
            ->join('genders','users.gender_id','=','genders.id')
            ->join('cities','users.city_id','=','cities.id')
        );

    }
}
