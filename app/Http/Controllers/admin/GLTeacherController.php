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
use Illuminate\Support\Facades\DB;

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
        $tree = $this->getTeacherUserWen($t_id);
        return view('admin/teacher/showWen',['arr'=>$tree]);
    }

    protected function getTeacherUserWen($t_id)
    {
        $arr=WenModel::join('user_index','user_index.user_id','=','wen.user_id')
            ->join('course','course.course_id','=','wen.course_id')
            ->where('wen.status','=',1)
            ->get()
            ->toArray();
        //根据讲师id把该讲师应该处理的问题分离出来
        $tree = [];
        foreach($arr as $k=>$v){
            if($v['t_id'] == $t_id){
                $tree[] = $v;
            }
        }
        return $tree;
    }
    /**
     *@content 回答问题
     *
     */
    public function replyWen(Request $request)
    {
        $arr = $request->all() ?? "";
        unset($arr['_token']);
        unset($arr['user_id']);
        $u_id = $request->user_id ?? "";
        $arr['u_id']=$u_id;
        $arr['c_time'] = time();
//        DB::beginTransaction();
//        try{
        $res = ReplyModel::insert($arr);
//            WenModel::where('wen_id',$arr['wen_id'])->update(['status'=>2]);
//            DB::commit();
//            return 1;
//        }catch( \Exception $e){
//            DB::rollBack();
//            var_dump($e->getMessage());
//            return 2;
//        }
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

}
