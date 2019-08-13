<?php

namespace App\Http\Controllers\index;

use App\Models\UserIndexModel;
use App\Models\CourseModel;
use App\Models\CourseTypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //前台主页
    public function index()
    {
        $courseType = CourseTypeModel::take(4)->get();

        $course = CourseModel::where(['excellent_course' => 1, 'audit' => 1])->take(8)->get();
        $user_id = session('user_id');
        if (empty($user_id)){
            echo "<script>alert('请先登录');location.href='/index/login'</script>";
        }
        $user_info = UserIndexModel::where(['user_id'=>$user_id])->first()->toArray();
        return view('index/index',compact('courseType','course'),compact('user_info','user_info'));
    }

    //根据课程分类ID获取课程
    public function typeGetCourse(Request $request){
        $course_id = $request->course_id;

        $whereData = [
            'course_id' => $course_id,
            'excellent_course' => 1,
            'audit' => 1
        ];
        $CourseInfo = CourseModel::where($whereData)->get()->toArray();
        return $CourseInfo;
    }
}
