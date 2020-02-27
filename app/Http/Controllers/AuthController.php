<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $username=$request->input('username');
        $email=$request->input('email');
        $password=Hash::make($request->input('password'));
        $register=User::create([
                    'username'=>$username,
                    'email'=>$email,
                    'password'=> $password
                ]);

        if($register){
            return response()->json([
                'success'=>true,
                'message'=>'register success',
                'data'=>$register
            ],201);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'register fail1',
                'data'=>''
            ],400);
        }
    }

    public function login(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');

        $user=User::where('email',$email)->first();
        if(Hash::check($password,$user->password)){
            $api_token=base64_encode(str_random(40));
            $user->update([
                'api_token'=>$api_token
            ]);
            return response()->json([
                'success'=>true,
                'message'=>'login success',
                'data'=>[
                    'user'=>$user,
                    'api_token'=>$api_token,
                    ]
            ],201);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'login fail!',
                'data'=>[
                    'user'=>'',
                    'api_token'=>'',
                    ]
            ],400);
        }
    }
}
