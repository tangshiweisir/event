
@extends('index/master')
@section('title')
    注册
@endsection
@section('content')


<div class="register" style="background:url(images/13.jpg) right center no-repeat #fff">
<h2>注册</h2>
<form action="/index/upduserdo" method="post">
    <input type="hidden" value="{{$user_info['user_id']}}" name="user_id">
    <div>
    <p class="formrow"><label class="control-label" for="register_email">邮箱地址</label>
    <input type="text" value="{{$user_info['user_email']}}" name="user_email" placeholder="请输入邮箱地址"></p>
    </div>
    <div>
    <p class="formrow"><label class="control-label" for="register_email">用户名</label>
    <input type="text" value="{{$user_info['user_name']}}" name="user_name" placeholder="请输入你的用户名,用户名是你的账号请保存"></p>
    </div>
    <div class="loginbtn reg">
    <button  class="uploadbtn ub1" id="submit">修改</button>
    </div>

</form>
</div>
@endsection
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script>
//     $(function(){
//
//
//             //注册
//             $('#submit').click(function(){
//                 var user_name=$("input[name='user_name']").val();
//                 var user_email=$("input[name='user_email']").val();
//                 var user_pwd=$("input[name='user_pwd']").val();
//                 var user_pwd1=$("input[name='user_pwd1']").val();
//                 //验证邮箱为空
//                 if(user_email==""){
//                     alert('邮箱不能为空');
//                     return false;
//                 }
//                 //验证用户名为空
//                 if( user_name=="")
//                 {
//                     alert('用户名不能为空');
//                     return false;
//                 }
//                 //验证密码
//                 reg=/^[0-9]{6,16}$/;
//                 if(user_pwd==""){
//                    alert('密码不能为空');
//                     return false;
//                 }else if(!reg.test(user_pwd)){
//                     alert('密码请输入6-16位数字');
//                     return false;
//                 }
//                 //验证确认密码
//                 if(user_pwd1==""){
//                    alert('确认密码不能为空');
//                     return false;
//                 }else if(user_pwd1 !== user_pwd){
//                     alert('密码与确认密码不一致');
//                     return false;
//                 }
// //
//                 $.ajax({
//                     type:'post',
//                     data:{user_name:user_name,user_email:user_email,user_pwd:user_pwd},
//                     url:"/index/registerDo",
//                     dataType:"json",
//                     success:function(msg){
//                         if(msg.code==1){
//                             alert(msg.msg);
//                             location.href="/index/login";
//                         }else{
//                             alert(msg.msg);
//                         }
//                     }
//                 })
//             return false;
//         })
//     })
</script>