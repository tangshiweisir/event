<?php

namespace App\Http\Controllers\admin;

use App\Models\ReplyModel;
use App\Models\TeacherModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TecherAdminController extends Controller
{
    //讲师后台首页
    public function index()
    {
        session_start();
        if (empty($_SESSION['teacherInfo'])) {
            header("Refresh:2;url=/admin/teacher/login");
        } else {
            $teacherInfo = $_SESSION['teacherInfo'];
//            dd($teacherInfo);
            $t_id = session('t_id');
            $data = TeacherModel::where('t_id', $t_id)->first();
            return view('admin/techerindex', ['teacherInfo' => $teacherInfo, 'data' => $data]);
            $teat =  TeacherModel::where('t_id',$t_id)->first();
//            dd($ttt);
            return view('admin/techerindex',['teacherInfo'=>$teacherInfo,'teat'=>$teat]);
        }
    }

    //讲师登录
    public function login(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return view('admin/teacher/teacherLogin');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $t_name = $request->t_name;
            $t_pwd = $request->t_pwd;

            //验证
            if (empty($t_name) || empty($t_pwd)) {
                return [
                    'code' => -1,
                    'msg' => '账号或密码不能为空'
                ];
            }
            //
            $res = TeacherModel::where(['t_name' => $t_name])->get()->toArray();
            if (!$res) {
                return [
                    'code' => -1,
                    'msg' => '账号不存在'
                ];
            }
            if ($t_pwd != $res[0]['t_pwd']) {
                return [
                    'code' => -1,
                    'msg' => '密码错误'
                ];
            } else {
                $teacherInfo = [
                    't_name' => $t_name,
                    't_pwd' => $t_pwd
                ];
                session(['t_id' => $res[0]['t_id']]);
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
    public function loginOut()
    {
        session_start();
        unset($_SESSION['teacherInfo']);
        header("refresh:2;url=/admin/teacher/login");
    }

    //讲师退出
    public function outlogin()
    {
        session(['t_id' => ""]);
        return redirect('/admin/techer/index');
    }
    /**
     * @content 退出登录
     * */
    public function logouted(Request $request)
    {
        $request->session()->forget('teacherInfo');
        $request->session()->forget('t_id');
        return redirect('/admin/techer/index');
    }
    //视频添加
    public function vliodcerate()
    {
        $data = \DB::table('course')->get();
//        dd($data);
        return view('admin.teacher.volid.add', compact('data'));
        session_start();
        $teacherInfo = $_SESSION['teacherInfo'];
        return view('admin.teacher.volid.add',compact('data','data','teacherInfo','teacherInfo'));

    }

    public function vliodadd_do()
    {
        $data = request()->post();
        session_start();
        $teacherInfo = $_SESSION['teacherInfo'];
        $data=request()->post();
        if (request()->hasfile('v_video')) {
            $data['v_video'] = $this->upload('v_video');
        }
        unset($data['MAX_FILE_SIZE']);
        $res = \DB::table('video')->insert($data);
        if ($data) {
            echo 'ok';
            header("refresh:3;url=/admin/video/list");
        } else {
            echo "no ";
        }

    }

    public function upload($name)
    {
        if (request()->file($name)->isValid()) {
            $photo = request()->file($name);
            $extension = $photo->extension(); //获取后缀

            $store_result = $photo->storeAs(date('Ymd'), date('Ymd') . rand(100, 999) . '.' . $extension);
//            $store_result = $photo->store('photo');
            return ($store_result);
            // print_r($store_result);exit();
        }
        exit('未获取到上传文件或上传过程出错');
    }





        //开启直播
       public function t_open()
        {
            session_start();
            $info = $_SESSION['teacherInfo'];
//        dd($info);
            $t_id = \DB::table('teacher')->where(['t_name' => $info['t_name']])->select('t_id')->first();
            $t_info = \DB::table('open')->where(['t_id' => $t_id->t_id])->first();
            $t_id = $t_id->t_id;
            if (empty($t_info)) {
                ;
                $data = time();
                $str = '123123';
                $str1 = $data . $str;
                $str1 = str_shuffle($str1);
                $str1 = substr($str1, '3', '8');
                $open_info = [
                    't_id' => $t_id->t_id,
                    'o_num' => $str1,
                    'c_time' => time(),
                    'status' => 2
                ];
                \DB::table('open')->insert($open_info);
            } else {
                $str1 = $t_info->o_num;
            }
            return view('admin/teacher/open/add', compact('str1', 't_id'));
        }

        function open_do()
        {
            $t_id = request()->post('t_id');

            $res = \DB::table('open')->where(['t_id' => $t_id])->update(['status' => 1]);
            if ($res !== false) {
                echo "开启成功请您开启 OBS 进行直播";
                header("refresh:3;url=/admin/techer/index");
            }
        }

        //讲师基本资料
        public
        function teacherZl(Request $request)
        {
            $t_id = session('t_id');
            $data = TeacherModel::where('t_id', $t_id)->first()->toArray();
            return view('/admin/teacher/teacherzl', ['data' => $data]);
        }

}
