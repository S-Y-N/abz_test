<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view(
          'main.index',
            [
                'totalUsers' => User::count(),
                'usersToday' => User::where('created_at', '>=', today())->count(),
                'usersPerWeek' => User::where('created_at','>=', $this->lastWeek())->count(),
            ]
        );
    }
    private function lastWeek()
    {
        return date_sub(today(),date_interval_create_from_date_string("7 days"));
    }
}
