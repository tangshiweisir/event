<?php

namespace App\Http\Controllers\admin;

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

            return view('admin/techerindex',['teacherInfo'=>$teacherInfo]);
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
                session(['t_id'=>$res['t_id']]);
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

}
