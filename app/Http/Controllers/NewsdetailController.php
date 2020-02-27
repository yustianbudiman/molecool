<?php

namespace App\Http\Controllers;

use App\Newsdetail;

class NewsdetailController extends Controller
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

    public function show($id){
        $newsdetail =Newsdetail::find($id);

        if($newsdetail){
            return response()->json([
                'success'=>true,
                'message'=>'News detail found',
                'data'=>$newsdetail
            ],200);
        }else{
             return response()->json([
                'success'=>true,
                'message'=>'News detail Not Found',
                'data'=>''
            ],404);
        }
    }

    //
}
