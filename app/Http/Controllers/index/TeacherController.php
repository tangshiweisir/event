<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{

    //讲师列表
    public function index()
    {
        return view('index/teacherlist');
    }

     //讲师详情
     public function teacher()
     {
         return view('index/teacher');
     }

}
