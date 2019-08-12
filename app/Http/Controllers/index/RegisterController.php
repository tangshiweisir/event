<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register()
    {
        return view('index/register');
    }
    public function registerDo(Request $request)
    {
        $data = $request->input();
        $user_name = $data['user_name'];
        $user_email = $data['user_email'];
        $user_pwd = $data['user_pwd'];
        //验证用户名是否存在
        $data1 = DB::table('user_index')->where(['user_name' => $user_name])->first();
        if ($data1) {
            $arr = [
                'code' => 0,
                'msg' => '此用户名已存在'
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
        //验证邮箱是否重复
        $data2 = DB::table('user_index')->where(['user_email' => $user_email])->first();
        if ($data2) {
            $arr = [
                'code' => 0,
                'msg' => '此邮箱已被注册'
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
        $time = time();
        //密码加密处理
        $password = password_hash($user_pwd, PASSWORD_BCRYPT);

        $dataInfo = [
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_pwd' => $password,
            'ctime' => $time
        ];
        $res = DB::table('user_index')->insert($dataInfo);
        if ($res) {
            $arr = [
                'code' => 1,
                'msg' => '注册成功,请登录'
            ];

            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
    }
}
