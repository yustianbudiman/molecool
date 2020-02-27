<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\Providers;
use App\News;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
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

    private $News=[
                    'content'=>'required',
                    'image'=>'required',
                    
                    ];

    public function save_news(Request $request){
        $this->validate($request,$this->News);
        $apiToken=explode(' ', $request->header('Authorization'));
        $check = DB::table('users')
            ->leftjoin('tbl_user_role', 'users.id', '=', 'tbl_user_role.id_user')
            ->leftjoin('tbl_role', 'tbl_user_role.id_role', '=', 'tbl_role.id')
            ->leftjoin('tbl_role_menu', 'tbl_role.id', '=', 'tbl_role_menu.id_role')
            ->select('users.username', 'tbl_role.nama_role', 'tbl_role_menu.action_create','tbl_role_menu.action_read','tbl_role_menu.action_update','tbl_role_menu.action_delete')
            ->where('users.api_token', $apiToken[1])
            ->get()->first();
        if($check->action_create==0){
            return response()->json([
                'success'=>true,
                'message'=>'Permision deny',
                'data'=>''
            ],201);
        }else{
            $news=News::create([
                        'content'=>$request->input('content'),
                        'image'=>$request->input('image'),
                    ]);

            if($news){
                return response()->json([
                    'success'=>true,
                    'message'=>'save success',
                    'data'=>$news
                ],201);
            }else{
                return response()->json([
                    'success'=>false,
                    'message'=>'save fail!',
                    'data'=>''
                ],400);
            }
        }
    }

    public function get_one($id){
        $news=News::where('id',$id)->first();

        if($news){
            return response()->json([
                'success'=>true,
                'message'=>'get data success',
                'data'=>$news
            ],201);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'get data fail!',
                'data'=>''
            ],400);
        }
    }

    public function show_all($start,$length){
        $news=DB::table('news')->skip($start)->take($length)->get();
        if($news){
            return response()->json([
                'success'=>true,
                'message'=>'get data success',
                'data'=>$news
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
        $this->validate($request,$this->News);
        $apiToken=explode(' ', $request->header('Authorization'));
        $check = DB::table('users')
            ->leftjoin('tbl_user_role', 'users.id', '=', 'tbl_user_role.id_user')
            ->leftjoin('tbl_role', 'tbl_user_role.id_role', '=', 'tbl_role.id')
            ->leftjoin('tbl_role_menu', 'tbl_role.id', '=', 'tbl_role_menu.id_role')
            ->select('users.username', 'tbl_role.nama_role', 'tbl_role_menu.action_create','tbl_role_menu.action_read','tbl_role_menu.action_update','tbl_role_menu.action_delete')
            ->where('users.api_token', $apiToken[1])
            ->get()->first();
        if($check->action_create==0){
            return response()->json([
                'success'=>true,
                'message'=>'Permision deny',
                'data'=>''
            ],201);
        }else{
            $news=News::find($id);
            if($news){
                $check=$news->update([
                        'id_role'=>$request->input('id_role'),
                        'id_menu'=>$request->input('id_menu'),
                    ]);
                if($check){
                    return response()->json([
                        'success'=>true,
                        'message'=>'Update success',
                        'data'=>$news
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
    }

    public function delete(Request $request){
        // $this->validate($request,$this->News);
        $id=$request->input('id');
        $apiToken=explode(' ', $request->header('Authorization'));
        $check = DB::table('users')
            ->leftjoin('tbl_user_role', 'users.id', '=', 'tbl_user_role.id_user')
            ->leftjoin('tbl_role', 'tbl_user_role.id_role', '=', 'tbl_role.id')
            ->leftjoin('tbl_role_menu', 'tbl_role.id', '=', 'tbl_role_menu.id_role')
            ->select('users.username', 'tbl_role.nama_role', 'tbl_role_menu.action_create','tbl_role_menu.action_read','tbl_role_menu.action_update','tbl_role_menu.action_delete')
            ->where('users.api_token', $apiToken[1])
            ->get()->first();
        if($check->action_create==0){
            return response()->json([
                'success'=>true,
                'message'=>'get data success',
                'data'=>'Permision deny'
            ],201);
        }else{
            $news=News::find($id);
            if($news){
                $check=$news->delete();
                if($check){
                    return response()->json([
                        'success'=>true,
                        'message'=>'Delete success',
                        'data'=>'1'
                    ],201);
                }else{
                    return response()->json([
                    'success'=>false,
                    'message'=>'Delete fail!',
                    'data'=>'0'
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
    }

    //
}
