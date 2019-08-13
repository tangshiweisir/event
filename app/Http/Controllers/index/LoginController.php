<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function login()
    {
        return view('index/login');
    }
    public function loginDo()
    {
        $user_name=$_POST['user_name'];
        $user_pwd=$_POST['user_pwd'];
        //验证为空
        if(empty($user_name) || empty($user_pwd)){
            $arr=[
                'code'=>0,
                'msg'=>'登陆所填元素不能为空'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

        $data=DB::table('user_index')->where(['user_name'=>$user_name])->first();

        if($data){
            $errno=$data->errno;
            $errno_time=$data->errno_time;
            $user_id=$data->user_id;
            $time=time();
            //用库存在
            if(password_verify($user_pwd,$data->user_pwd)){
                //登陆逻辑

                if($time - $errno_time < 3600){
                    if($errno >= 3){
                        $arr=[
                            'code'=>0,
                            'msg'=>'登录次数超过限制次数不能登陆'
                        ];
                        return json_encode($arr,JSON_UNESCAPED_UNICODE);
                    }
                }else{
                    $where=[
                        'errno'=>0,
                        'errno_time'=>$time
                    ];
                    DB::table('user_index')->where(['user_id'=>$user_id])->update($where);
                }
                Cookie::queue('user_id', $user_id);
                session(['user_id'=>$user_id]);
                $arr=[
                    'code'=>1,
                    'msg'=>'登陆成功'
                ];

                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                if($time - $errno_time > 3600){
                    $where=[
                        'errno'=>1,
                        'errno_time'=>$time
                    ];
                    DB::table('user_index')->where(['user_id'=>$user_id])->update($where);
                }else{
                    if($errno >= 3){
                        $arr=[
                            'code'=>0,
                            'msg'=>'账号已锁定,请一小时后再次登陆'
                        ];
                        return json_encode($arr,JSON_UNESCAPED_UNICODE);
                    }else{
                        $where=[
                            'errno'=>$errno+1,
                            'errno_time'=>$time
                        ];
                        DB::table('user_index')->where(['user_id'=>$user_id])->update($where);
                    }
                }
                //登录失败
                $arr=[
                    'code'=>0,
                    'msg'=>'密码不正确'
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }else{
            $arr=[
                'code'=>0,
                'msg'=>'用户名错误或者未注册'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

    }



}
