<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\SearchController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        return $this->handleSearch(
          $request,
          DB::table('countries')
        );
    }
}
