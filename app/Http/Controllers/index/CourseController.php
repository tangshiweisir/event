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
        $data=DB::table('course_type')->where(['p_id'=>0])->get();
        foreach($data as $k=>$v){
            $data[$k]->arr=$res=DB::table('course_type')->where(['p_id'=>$v->course_type_id])->get();
        }
        $dataInfo=DB::table('course')->where(['status'=>1,'is_pass'=>1])->simplePaginate(6);

        return view('index/courselist',['data'=>$data,'dataInfo'=>$dataInfo]);
    }

    public function coursetypeshow(){
        $course_type_id=$_GET['course_type_id'];
        $dataInfo=DB::table('course')->where(['status'=>1,'is_pass'=>1,'course_type_id'=>$course_type_id])->simplePaginate(6);
//        echo 111;die;
//       var_dump($dataInfo);die;
        return  view('index/coursetypeshow',['dataInfo'=>$dataInfo]);
    }
    /*
     * 进入课程详情
     */
    public function courseDetail(){
        return view('index.coursedetail');
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


     //开始学习
     public function video()
     {
         return view('index/video');
     }
}
