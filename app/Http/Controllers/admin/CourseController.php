<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
  //课程添加页面
  public function courseAdd(){
      return view('admin/course/courseadd');
  }
  //课程添加
  public function courseAddDo(){
  
}
//课程展示页面
public function courseList(){
    return view('admin/course/courselist');
}
//留言展示页面
public function coursemessageList(){
    return view('admin/course/coursemessageList');
}
}
