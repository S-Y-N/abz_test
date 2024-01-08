<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        //return response([$users]);
        return view ('user.index',compact('users'));
    }
    public function getUsers(Request $request)
    {
        $perPage = $request->get('count', 5); // Количество записей на странице, по умолчанию 5
        $page = $request->get('page', 1); // Номер страницы, по умолчанию 1

        $users = User::paginate($perPage, ['*'], 'page', $page);
        //dd($users);
        return response()->json($users);
    }

}
