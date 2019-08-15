<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LeavesWordModel;

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
        $data = LeavesWordModel::select()->orderBy('l_id','desc')->get();
        return view('admin/course/coursemessageList',['data'=>$data]);
    }


    public function aduitMessage(Request $request)
    {
        if($request->isMethod('post') || $request->isMethod('ajax')){
            $l_id = $request->l_id ?? "";
            $type = $request->type ?? ""; //1为通过  2为不通过
            if($type == 1){
                // 通过
                // 根据l_id
                // 将数据库audit字段改为1
                $res = LeavesWordModel::where(['l_id'=>$l_id])->update(['status'=>1]);
            }else{
                // 不通过
                // 根据l_id
                // 将数据库status字段改为2
                $res = LeavesWordModel::where(['l_id'=>$l_id])->update(['status'=>2]);
            }
            if($res){
                return 1;//修改成功
            }else{
                return 2;//修改失败
            }
        }else{
            $data = LeavesWordModel::where(['status'=>2])->orderBy('l_id','desc')->get();
            return view('admin/course/coursemessageList',['data'=>$data]);
        }
    }
}
