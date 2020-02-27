<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role_menu;

class RolemenuController extends Controller
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

    private $role_menu_rules=[
                    'id_role'=>'required',
                    'id_menu'=>'required',
                    
                    ];

    public function save_role_menu(Request $request){
        $this->validate($request,$this->role_menu_rules);
        $menu_role=Role_menu::create([
                    'id_role'=>$request->input('id_role'),
                    'id_menu'=>$request->input('id_menu'),
                    'action_create'=>$request->input('action_create'),
                    'action_read'=>$request->input('action_read'),
                    'action_update'=>$request->input('action_update'),
                    'action_delete'=>$request->input('action_delete'),
                ]);

        if($menu_role){
            return response()->json([
                'success'=>true,
                'message'=>'save success',
                'data'=>$menu_role
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
        $menu_role=Role_menu::where('id',$id)->first();

        if($menu_role){
            return response()->json([
                'success'=>true,
                'message'=>'get data success',
                'data'=>$menu_role
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
        $menu_role=Role_menu::find($id);
        if($menu_role){
            $check=$menu_role->update([
                    'id_role'=>$request->input('id_role'),
                    'id_menu'=>$request->input('id_menu'),
                ]);
            if($check){
                return response()->json([
                    'success'=>true,
                    'message'=>'Update success',
                    'data'=>$menu_role
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
