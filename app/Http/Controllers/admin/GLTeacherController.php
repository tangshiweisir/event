<?php

namespace App\Http\Controllers\admin;

use App\Models\Teacher;
use App\Models\TeacherModel;
use App\Models\UserIndexModel;
use App\Models\ReplyModel;
use App\Models\WenModel;
use App\Models\CourseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GLTeacherController extends Controller
{
    /**
     * @content回答问题
     *
     */
    public function reply(Request $request)
    {
        $t_id = session('t_id');
        #这个讲师的课程里哪个用户提问的问题
        $arr=WenModel::join('user_index','user_index.user_id','=','wen.user_id')
            ->join('course','course.course_id','=','wen.course_id')
            ->where('wen.status','=',1)
            ->get()
            ->toArray();
        dd($arr);
        //根据讲师id把该讲师应该处理的问题分离出来
        $tree = [];
        dd($arr);
        foreach($arr as $k=>$v){
            if($v['t_id'] == $t_id){
                $tree[] = $v;
            }
        }
        //根据课程把问题进行分类
        $data = CourseModel::where('t_id',$t_id)->get()->toArray();
        dd($tree);
        dd($data);
        return view('admin/teacher/showWen',['arr'=>$tree,'data'=>$data]);
    }


}
