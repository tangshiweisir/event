<?php

namespace App\Http\Controllers\index;

use App\Models\UsersModel;
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


    /**
     * @content 退出登录
     * */
    public function logout()
    {
        session(['user_id'=>""]);
        return redirect('/index/index');
    }

    /**
     * 微博授权页面
     */

    public function callback(Request $request)
    {
        set_time_limit(0);
        $code = $request->code;
//        dd($code);die;

        $url = "https://api.weibo.com/oauth2/access_token?client_id=305250602&client_secret=5029705c7d70dfcc82f07aaf395008b3&grant_type=authorization_code&redirect_uri=http://www.onedu.com/index/callback&code=".$code;
        $data = $this->curl($url);
//            dd($data);

        //获取微博登陆用户的信息
        $userInfo=json_decode($data,true);
        $token = $userInfo['access_token'];
        $uid = $userInfo['uid'];
//        dd($userInfo);
        $urla="https://api.weibo.com/2/users/show.json?access_token=$token&uid=$uid";
//        dd($urla);
//        $uu = $this->curl($urla);
        $uu = file_get_contents($urla);
//        dd($uu);
        $user = json_decode($uu,true);
        $user_name = $user['screen_name'];
        $data = [
            'user_name'=>$user_name,
            'token'=>$token,
            'ctime'=>time()
        ];
        $res = UsersModel::insert($data);
        $res1=UsersModel::where('user_name',$user_name)->first();

        if($res){
            session(['user_id'=>$res1->user_id,'user_name'=>$res1->user_name]);
            echo "<script>alert('登陆成功');location.href='/index/index'</script>";
        }else{
            echo "<script>alert('登录失败，请重新登陆');location.href='/index/login'</script>";
        }
    }

    protected function curl($url)
    {
        //curl初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        return $data;
    }
}
