<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /*
     * 课程展示
     * */
    public function courseList()
    {
        return view('index/courselist');
    }


    /*
     * 个人中心
     * */
    public function mycourse()
    {
        return view('index/mycourse');
    }

    //加入学习
    public function coursecont()
    {
        return view('index/coursecont');
    }

     //课程详情
     public function coursecont1()
     {
         return view('index/coursecont1');
     }


     //开始学习
     public function video()
     {
         return view('index/video');
     }
}
