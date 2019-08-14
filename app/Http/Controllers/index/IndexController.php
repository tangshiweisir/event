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
//        $courseType=json_encode($courseType);
//        $courseType=json_decode($courseType,true);

//        dd($courseType);
        $course = CourseModel::where(['is_well' => 1, 'status' => 1])->take(8)->get();
//        dd($course);
        $user_id = session('user_id');

        if($user_id){
            $user_info = UserIndexModel::where(['user_id'=>$user_id])->first()->toArray();
        }else{
            $user_info = "";
        }

        if (empty($user_id)){
            echo "<script>alert('请先登录');location.href='/index/login'</script>";
        }
        $user_info = UserIndexModel::where(['user_id'=>$user_id])->first()->toArray();
        return view('index/index',compact('courseType','course','user_info','user_info'));
    }

    //根据课程分类ID获取课程
    public function typeGetCourse(Request $request){
        $course_id = $request->course_id;
//        dd($course_id);
        $whereData = [
            'course_type_id' => $course_id,
            'is_well' => 1,
            'status' => 1
        ];
        $CourseInfo = CourseModel::where($whereData)->get()->toArray();
//        dd($CourseInfo);
        return $CourseInfo;
    }
}
