<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LeavesWordModel;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
  //课程添加页面
  public function courseAdd(){
      return view('admin/course/courseadd');
      $data=$this->course_type();
       $teacher=$this->teacher();
      return view('admin/course/courseadd',['data'=>$data,'teacher'=>$teacher]);
  }
  public function course_type(){
      $data=DB::table('course_type')->where(['status'=>1,'p_id'=>0])->get();
      foreach($data as $k=>$v){
        $data[$k]->arr=$dataInfo=DB::table('course_type')->where(['p_id'=>$v->course_type_id])->get();
      
      }
      return $data;
  }
  public function teacher(){
    $teacher=DB::table('teacher')->where(['audit'=>1])->get();
    return $teacher;
  }
  //图片上传
  public function image(Request $request){
      $images=$request->file('file');
    //   var_dump($images);die;
      $text=$images->getClientOriginalExtension();
    //   var_dump($text);die;
      $imagename=rand(1,99).time().".{$text}";
      $name=$_FILES['file']['tmp_name'];
    //    var_dump($_FILES);die;

      $public='upload'.'/'.date('Y-m-d',time());
      if(!is_dir($public)){
          //如果文件保存在文件夹中
          $public=mkdir($public,0777,true);
      }
      $new_file_name=$public.'/'.$imagename;
      $info=move_uploaded_file($name,$new_file_name);
      if($info){
          $arr=[
              'code'=>1,
              'font'=>'上传成功',
              'src'=>$new_file_name
          ];
          return json_encode($arr);
      }else{
          return $file->getError();
      }
    //   var_dump($name);
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
