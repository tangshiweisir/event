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
        if (request()->hasfile('v_video')) {
            $data['v_video'] = $this->upload('v_video');
        }

    }
    public function upload($name)
    {
        // 判断错误号
        $files=$_FILES;
        if (@$files['error'] == 00) {

            // 判断文件类型

            $ext = strtolower(pathinfo(@$files['name'],PATHINFO_EXTENSION));

           $path='http://192.168.220.130/upload';

            // 判断是否存在上传到的目录

            if (!is_dir($path)){

                mkdir($path,0777,true);

            }

            // 生成唯一的文件名

            $fileName = md5(uniqid(microtime(true),true)).'.'.$ext;

            // 将文件名拼接到指定的目录下

            $destName = $path."/".$fileName;

            // 进行文件移动

//            dd($files);
            if (!move_uploaded_file($files['v_video']['tmp_name'],$destName)){

                return "文件上传失败！";

            }

            return "文件上传成功！";

        } else {

            // 根据错误号返回提示信息

            switch (@$files['error']) {

                case 1:

                    echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";

                    break;

                case 2:

                    echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";

                    break;

                case 3:

                    echo "文件只有部分被上传";

                    break;

                case 4:

                    echo "没有文件被上传";

                    break;

                case 6:

                case 7:

                    echo "系统错误";

                    break;

            }

        }
    }
}
