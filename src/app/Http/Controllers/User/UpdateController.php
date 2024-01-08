<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
\Tinify\setKey("226vKpJl5STXRVx2bTSC2SfsxSNWj2jb");

class UpdateController extends Controller
{

    public function __invoke(Request $request, User $user)
    {
        $data = $request->all();
        //якщо вказали новий пароль - хешуємо
        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        //інакше видалаяємо ключ з масиву
        if(array_key_exists('password',$data) && $data['password']== null)
            unset($data['password']);

        $filePath = $request->file('photo')->path();
        $source = \Tinify\fromFile($filePath);;

        $compFN = time().'_'.uniqid().'_'.$request->file('photo')->getClientOriginalName();
        $compPath = 'storage/images/'.$compFN;
        $source->toFile(public_path($compPath));
        $data['photo'] = $compPath;

        $user->update($data);

        return redirect()->route('user.index');
    }
}
