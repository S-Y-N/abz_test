<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'last_name'=>'required|max:255',
            'first_name'=>'required|max:255',
            'middle_name'=>'required|max:255',
            'email'=>'required|unique:users|max:255',
            'password'=>'required|min:6',
            'gender_id'=>['required','numeric','min:1','max:2'],
            'city_id'=>['required','numeric','min:1'],
            'position_id'=>['required','numeric','min:1'],
            'phone'=>['required','string','max:16'],
            'birth_day'=>['required','date']
        ]);
        $user = User::create([
            'last_name'=>$request->last_name,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'email'=>$request->email,
            'gender_id'=>$request->gender_id,
            'city_id'=>$request->city_id,
            'position_id'=>$request->position_id,
            'birth_day'=>$request->birth_day,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ]);
        $token=$user->createToken('auth_token')->accessToken;

        //$user->update(['remember_token'=>$token]);
        return response([
            'success'=> true,
            'token'=>$token
        ]);
    }
    public function getToken(Request $request, $id)
    {
        if(!is_numeric($id)){
            return response(['message'=>'Invalid user ID']);
        }
        $user = User::find($id);
        if($user){
            $token = $user->createToken('auth_token')->accessToken;
            return response(['token'=>$token],200);
        }
        return response(['msg'=>'user not found'],404);
    }
    public function login(Request $request)
    {
        $request->validate([
            'last_name'=>'required|max:255',
            'first_name'=>'required|max:255',
            'middle_name'=>'required|max:255',
            'email'=>'required|max:255',
            'password'=>'required|min:6'
        ]);

        $user = User::where('email',$request->email)->first();

        if(! $user || !Hash::check($request->password,$user->password)){
            return response([
                'message'=>'The credentials are incorrect'
            ]);
        }
        $token=$user->createToken('auth_token')->accessToken;

        return response([
            'token'=>$token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response([
            'message'=>'Logged out'
        ]);
    }
}
