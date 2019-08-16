<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpenController extends Controller
{
    public function index()
    {
        $data=\DB::table('open')->where(['status'=>1])->get();
        $data=json_encode($data);
        $data=json_decode($data,true);
//        dd($data);
        $t_id=[];
        foreach ($data as $k=>$v){
            $t_id[]=$v['t_id'];
        }
//        dd($t_id);
        $t_name=\DB::table('teacher')->whereIn('t_id',$t_id)->get();
        $t_name=json_encode($t_name);
        $t_name=json_decode($t_name,true);
     return view('index/open/index',compact('t_name'));
    }
}
