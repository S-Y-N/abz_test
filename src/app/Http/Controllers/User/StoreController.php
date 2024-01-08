<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
\Tinify\setKey("226vKpJl5STXRVx2bTSC2SfsxSNWj2jb");

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $requestData = $request->all();
        $filePath = $request->file('photo')->path();

        $source = \Tinify\fromFile($filePath);;

        $compFN = time().'_'.uniqid().'_'.$request->file('photo')->getClientOriginalName();
        $compPath = 'storage/images/'.$compFN;
        $source->toFile(public_path($compPath));
        $requestData['photo'] = $compPath;

        User::create($requestData);

        return redirect()->route('user.index');
    }

}
