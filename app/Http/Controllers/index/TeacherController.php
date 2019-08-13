<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{

    //讲师列表
    public function index()
    {
        $data = DB::table("teacher")->get();
//        dd($data);
        return view('index/teacherlist',compact('data'));
    }

     //讲师详情
     public function teacher()
     {
         $t_id=$_GET['t_id'];
         $res = DB::table("teacher")->where(['t_id'=>$t_id])->get();
//         dd($data);
         return view('index/teacher',compact('res'));
     }

}
