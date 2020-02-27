<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_role;

class UserroleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $user_role_rules=[
                    'id_user'=>'required',
                    'id_role'=>'required',
                    ];

    public function save_user_role(Request $request){
        $this->validate($request,$this->user_role_rules);
        $user_role=User_role::create([
                    'id_user'=>$request->input('id_user'),
                    'id_role'=>$request->input('id_role'),
                ]);

        if($user_role){
            return response()->json([
                'success'=>true,
                'message'=>'save success',
                'data'=>$user_role
            ],201);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'save fail!',
                'data'=>''
            ],400);
        }
    }

    public function get_one($id){
        $user_role=User_role::where('id',$id)->first();

        if($user_role){
            return response()->json([
                'success'=>true,
                'message'=>'get data success',
                'data'=>$user_role
            ],201);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'get data fail!',
                'data'=>''
            ],400);
        }
    }

    public function update(Request $request,$id){
        $user_role=User_role::find($id);
        if($user_role){
            $check=$user_role->update([
                    'id_user'=>$request->input('id_user'),
                    'id_role'=>$request->input('id_role'),
                ]);
            if($check){
                return response()->json([
                    'success'=>true,
                    'message'=>'Update success',
                    'data'=>$user_role
                ],201);
            }else{
                return response()->json([
                'success'=>false,
                'message'=>'Update fail!',
                'data'=>''
            ],400);
            }
            
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Data Not found!',
                'data'=>''
            ],400);
        }
    }

    //
}
