<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    /*
     * 验证邮箱页面
     */
   public function emailcheck(){
       return view('index.emailcheck');
   }
   /*
    * 验证邮箱发送验证码
    */
   public function emailcheckDo(){
       $user_email=$_POST['user_email'];
       //验证邮箱是否为用户邮箱
       $isemail=DB::table('user_index')->where(['user_email'=>$user_email])->first();
       if($isemail){
           $code=rand(1000,9999);

           $res= Mail::send('index/emailcon',['code'=>$code],function($message)use($user_email){
               $message->subject("注册");
               $message->to($user_email);
           });
           if($res== null){
               $data=DB::table('email_code')->where(['user_email'=>$user_email])->first();
               if($data){
                   $data=DB::table('email_code')->where(['user_email'=>$user_email])->update(['code'=>$code]);
                   if($data){
                       $arr=[
                           'code'=>1,
                           'msg'=>'发送成功'
                       ];
                   }
               }else{
                   $where=[
                       'user_email'=>$user_email,
                       'code'=>$code
                   ];
                   $data=DB::table('email_code')->insert($where);
                   if($data){
                       $arr=[
                           'code'=>1,
                           'msg'=>'发送成功'
                       ];

                   }
               }

           }else{
               $arr=[
                   'code'=>0,
                   'msg'=>'发送失败'
               ];
           }
           return json_encode($arr,JSON_UNESCAPED_UNICODE);
       }else{
           $arr=[
               'code'=>0,
               'msg'=>'此邮箱不为已创建用户邮箱'
           ];
           return json_encode($arr,JSON_UNESCAPED_UNICODE);
       }

   }
   /*
    * 验证验证码
    */
   public function codecheck(){
       $user_email=$_POST['user_email'];
       $code=$_POST['code'];
       $data=DB::table('email_code')->where(['user_email'=>$user_email])->first();
       $code1=$data->code;
       if($code == $code1){
           $arr=[
               'code'=>1,
               'msg'=>'验证成功，进入修改密码页面'
           ];
       }else{
           $arr=[
               'code'=>0,
               'msg'=>'验证错误'
           ];
       }
       return json_encode($arr,JSON_UNESCAPED_UNICODE);
   }

   /*
    * 修改密码页面
    */
   public function password(){
       $user_email=$_GET['user_email'];
       $data=[
           'user_email'=>$user_email
       ];
//       echo $user_email;die;
       return view('index.password',$data);
   }
   /*
    * 修改密码
    */
   public function passwordDo(){
     $user_email=$_POST['user_email'];
     $user_pwd=$_POST['user_pwd'];
//     echo $user_pwd;die;
     $data=DB::table('user_index')->where(['user_email'=>$user_email])->update(['user_pwd'=>$user_pwd]);
     if($data){
         $arr=[
             'code'=>1,
             'msg'=>'修改成功请登录'
         ];
     }else{
         $arr=[
             'code'=>0,
             'msg'=>'修改失败'
         ];
     }
     return json_encode($arr,JSON_UNESCAPED_UNICODE);

   }
}
