<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
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

    private $role_rules=[
                    'nama_role'=>'required|max:255',
                    'deskripsi'=>'max:255',
                    ];

    public function save_role(Request $request){
        $this->validate($request,$this->role_rules);
        $role=Role::create([
                    'nama_role'=>$request->input('nama_role'),
                    'deskripsi'=>$request->input('deskripsi'),
                ]);

        if($role){
            return response()->json([
                'success'=>true,
                'message'=>'save success',
                'data'=>$role
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
        $role=Role::where('id',$id)->first();

        if($role){
            return response()->json([
                'success'=>true,
                'message'=>'get data success',
                'data'=>$role
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
        $role=Role::find($id);
        if($role){
            $check=$role->update([
                    'nama_role'=>$request->input('nama_role'),
                    'deskripsi'=>$request->input('deskripsi'),
                ]);
            if($check){
                return response()->json([
                    'success'=>true,
                    'message'=>'Update success',
                    'data'=>$role
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
