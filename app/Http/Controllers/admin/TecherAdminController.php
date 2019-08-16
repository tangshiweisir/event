<?php

namespace App\Http\Controllers\admin;

use App\Models\ReplyModel;
use App\Models\TeacherModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TecherAdminController extends Controller
{
    //讲师后台首页
    public function index()
    {
        session_start();
        if(empty($_SESSION['teacherInfo'])){
            header("Refresh:2;url=/admin/teacher/login");
        }else{
            $teacherInfo = $_SESSION['teacherInfo'];
            $t_id = session('t_id');
            $data =  TeacherModel::where('t_id',$t_id)->first();
            return view('admin/techerindex',['teacherInfo'=>$teacherInfo,'data'=>$data]);
        }
    }
    //讲师登录
    public function login(Request $request){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view('admin/teacher/teacherLogin');
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            $t_name = $request->t_name;
            $t_pwd = $request->t_pwd;

            //验证
            if(empty($t_name) || empty($t_pwd)){
                return [
                    'code' => -1,
                    'msg' => '账号或密码不能为空'
                ];
            }
            //
            $res = TeacherModel::where(['t_name'=>$t_name])->get()->toArray();
            if(!$res){
                return [
                    'code' => -1,
                    'msg' => '账号不存在'
                ];
            }
            if($t_pwd != $res[0]['t_pwd']){
                return [
                    'code' => -1,
                    'msg' => '密码错误'
                ];
            }else{
                $teacherInfo = [
                    't_name' => $t_name,
                    't_pwd' => $t_pwd
                ];
                session(['t_id'=>$res[0]['t_id']]);
                session_start();
                $_SESSION['teacherInfo'] = $teacherInfo;
                return [
                    'code' => 200,
                    'msg' => '登录成功'
                ];
            }
        }
    }
    //讲师登录退出
    public function loginOut(){
        session_start();
        unset($_SESSION['teacherInfo']);
        header("refresh:2;url=/admin/teacher/login");
    }
    //讲师退出
    public function outlogin()
    {
       session(['t_id'=>""]);
       return redirect('/admin/techer/index');
    }
    //视频添加
    public function vliodcerate()
    {
        $data=\DB::table('course')->get();
//        dd($data);
        return view('admin.teacher.volid.add',compact('data'));
    }
    public function vliodadd_do()
    {
        $data=request()->post();
        if (request()->hasfile('v_video')) {
            $data['v_video'] = $this->upload('v_video');
        }
        unset($data['MAX_FILE_SIZE']);
        $res=\DB::table('video')->insert($data);
        if($data){
            echo 'ok';
            header("refresh:3;url=/admin/video/list");
        }else{
            echo "no ";
        }

    }
    public function upload($name)
    {
        if (request()->file($name)->isValid()) {
            $photo = request()->file($name);
            $extension = $photo->extension(); //获取后缀

            $store_result = $photo->storeAs(date('Ymd'), date('Ymd').rand(100,999).'.'.$extension);
//            $store_result = $photo->store('photo');
            return($store_result);
            // print_r($store_result);exit();
        }
        exit('未获取到上传文件或上传过程出错');
    }
    
    //讲师基本资料
    public function teacherZl(Request $request)
    {
        $t_id = session('t_id');
        $data =  TeacherModel::where('t_id',$t_id)->first()->toArray();
        return view('/admin/teacher/teacherzl',['data'=>$data]);
    }
    
}
