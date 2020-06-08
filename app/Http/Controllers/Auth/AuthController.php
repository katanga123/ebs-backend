<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;

use App\User;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 

            $user = Auth::user(); 
            $success['token'] =  $user->createToken(ENV('APP_NAME') .' Login')->accessToken; 
            return response()->json(['success' => $success], 200);

        } else{

            return response()->json(['message' => 'Sorry!, Invalid credentials'], 401); 
        } 
    }

    public function register(AuthRequest $request){

         $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ];

        $user = User::create($data);

        $success['token'] = $user->createToken(ENV('APP_NAME').' Register')->accessToken;

        return response()->json(['success'=>$success], 200); 
    
    }

    public function getUser(){
        $user = Auth::user();
        return response()->json($user, 200);
    }
}
