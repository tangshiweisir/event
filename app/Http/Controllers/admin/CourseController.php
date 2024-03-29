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
    
    $data=$this->course_type();
    $teacher=$this->teacher();
   return view('admin/course/courseadd',['data'=>$data,'teacher'=>$teacher]);
  }
  //留言展示页面
  public function coursemessageList(){
        $data = LeavesWordModel::select()->orderBy('l_id','desc')->get();
        return view('admin/course/coursemessageList',['data'=>$data]);
  }  
  //课程分类数据
  public function course_type(){
      $data=DB::table('course_type')->where(['status'=>1,'p_id'=>0])->get();
      foreach($data as $k=>$v){
        $data[$k]->arr=$dataInfo=DB::table('course_type')->where(['p_id'=>$v->course_type_id])->get();
      
      }
      return $data;
  }
  //讲师数据
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
              'msg'=>'上传成功',
              'src'=>$new_file_name
          ];
          return json_encode($arr);
      }else{
          return $file->getError();
      }
    //   var_dump($name);
  }
  //课程添加
  public function courseAddDo(Request $request){
      $data=$request->input();
      $dataInfo=[
        'course_name'=>$data['course_name'],
        'course_type_id'=>$data['course_type_id'],
        'course_img'=>$data['image'],
        'course_money'=>$data['course_money'],
        'course_hour'=>$data['course_hour'],
        'hour_duration'=>$data['hour_duration'],
        'start_people'=>$data['start_people'],
        'course_speak_people'=>$data['course_speak_people'],
        'course_speak_score'=>$data['course_speak_score'],
        'is_well'=>$data['is_well'],
        'c_time'=>time(),
        'u_time'=>time(),
        't_id'=>$data['t_id']
      ];
      $data=DB::table('course')->insert($dataInfo);
      if($data){
        $arr=[
          'code'=>1,
          'msg'=>'课程添加成功'
        ];
      }else{
        $arr=[
          'code'=>0,
          'msg'=>'课程添加失败'
        ];
      }
      return json_encode($arr);
  }
  //课程展示页面
  public function courseList(){
    $data = DB::table('course')->join("course_type","course_type.course_type_id","=","course.course_type_id")
            ->join("teacher","teacher.t_id","=","course.t_id")
            ->where(["course.status"=>1])->orderBy("course_id","asc")->paginate(5);
        // var_dump($data);die;  
    return view('admin/course/courselist',['data'=>$data]);
  }
  //课程删除（軟删）
  public function courseDel(){
    $course_id=$_POST['course_id'];
    $data=DB::table('course')->where(['course_id'=>$course_id])->update(['status'=>2]);
    if($data){
      $arr=[
        'code'=>'1',
        'msg'=>'删除成功'
      ];
    }else{
      $arr=[
        'code'=>'0',
        'msg'=>'删除失败'
      ];
    }
    return json_encode($arr);
    
  }

  //课程课章添加页面
  public function section(){
    $data=DB::table('course')->where(['status'=>1])->get();
    return view('admin/course/coursesection',['data'=>$data]);
  }
  //课程课章添加
  public function sectionAdd(Request $request){
    $data=$request->input();
    $res=DB::table('course_section')->insert($data);
    if($res){
      $arr=[
        'code'=>1,
        'msg'=>'添加课章成功'
      ];
    }else{
      $arr=[
        'code'=>0,
        'msg'=>'添加课章失败'
      ];
    }
    return json_encode($arr);
  }
  //课程课节添加页面
  public function lesson(){
    $data=DB::table('course_section')->where(['status'=>1])->get();
    return view('admin/course/courselesson',['data'=>$data]);
  }
  //课程课节添加
  public function lessonAdd(Request $request){
    $data=$request->input();
    $res=DB::table('course_lesson')->insert($data);
    if($res){
      $arr=[
        'code'=>1,
        'msg'=>'添加课节成功'
      ];
    }else{
      $arr=[
        'code'=>0,
        'msg'=>'添加课节失败'
      ];
    }
    return json_encode($arr);
  }

  //课程课时添加页面
  public function hour(){
    $data=DB::table('course_lesson')->where(['status'=>1])->get();
    // var_dump($data);die;
    return view('admin/course/coursehour',['data'=>$data]);
  }
  
  //课程课时添加
  public function hourAdd(Request $request){
    $data=$request->input();
    $res=DB::table('course_hour')->insert($data);
    if($res){
      $arr=[
        'code'=>1,
        'msg'=>'添加课时成功'
      ];
    }else{
      $arr=[
        'code'=>0,
        'msg'=>'添加课节失败'
      ];
    }
    return json_encode($arr);
  
      
  }






  //评论
  public function aduitMessage(Request $request){
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
