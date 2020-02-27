<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
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

    private $menu_rules=[
                    'nama_menu'=>'required|max:255',
                    'icon_menu'=>'required|max:255',
                    'link_menu'=>'required|max:255',
                    'type_menu'=>'required|max:255',
                    'ordering'=>'required|max:255',
                    'id_parent'=>'required|max:255',
                    ];

    public function save_menu(Request $request){
        $this->validate($request,$this->menu_rules);
        $menu=Menu::create([
                    'nama_menu'=>$request->input('nama_menu'),
                    'icon_menu'=>$request->input('icon_menu'),
                    'link_menu'=>$request->input('link_menu'),
                    'type_menu'=>$request->input('type_menu'),
                    'ordering'=>$request->input('ordering'),
                    'id_parent'=>$request->input('id_parent'),
                ]);

        if($menu){
            return response()->json([
                'success'=>true,
                'message'=>'register success',
                'data'=>$menu
            ],201);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'register fail!',
                'data'=>''
            ],400);
        }
    }

    public function get_one($id){
        $menu=Menu::where('id',$id)->first();

        if($menu){
            return response()->json([
                'success'=>true,
                'message'=>'register success',
                'data'=>$menu
            ],201);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'register fail!',
                'data'=>''
            ],400);
        }
    }

    public function update(Request $request,$id){
        $menu=Menu::find($id);
        if($menu){
            $check=$menu->update([
                    'nama_menu'=>$request->input('nama_menu'),
                    'icon_menu'=>$request->input('icon_menu'),
                    'link_menu'=>$request->input('link_menu'),
                    'type_menu'=>$request->input('type_menu'),
                    'ordering'=>$request->input('ordering'),
                    'id_parent'=>$request->input('id_parent'),
                    'deskripsi'=>$request->input('deskripsi'),
                ]);
            if($check){
                return response()->json([
                    'success'=>true,
                    'message'=>'Update success',
                    'data'=>$menu
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
