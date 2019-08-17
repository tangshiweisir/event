
@extends('index/master')
@section('title')
    登录
@endsection
@section('content')

<div class="login" style="background:url(images/12.jpg) right center no-repeat #fff">
<h2>登录</h2>
<form style="width:600px">
<div>
    <p class="formrow">
    <label class="control-label" for="register_email">帐号</label>
    <input type="text" name="user_name" placeholder="请输入用户名">
    </p>
</div>
<div>
    <p class="formrow">
    <label class="control-label" for="register_email">密码</label>
    <input type="password" name="user_pwd" placeholder="请输入用户名密码">
    </p>
</div>
<div class="loginbtn">
	<label><input type="checkbox"  checked="checked"> <span class="jzmm">记住密码</span> </label>&nbsp;&nbsp;
    <button id="submit" class="uploadbtn ub1" >登录</button>
    
</div>
<div class="loginbtn lb">
   <a href="/index/register" class="link-muted">还没有账号？立即免费注册</a>
   <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
   <a href="/index/emailcheck" class="link-muted">找回密码</a>
</div>
    <div style="margin-left: 150px;margin-top:20px;">
        <a href="https://api.weibo.com/oauth2/authorize?client_id=305250602&response_type=code&redirect_uri=http://www.shop.cn/index/callback">
            <img src="images/hezuowb.png" class="hzwb" title="微博" width="40" height="40"/>
        </a>
    </div>
</form>

</div>

@endsection
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script>
    $(function(){
        //登陆
        $('#submit').click(function(){
            var user_name=$("input[name='user_name']").val();
            var user_pwd=$("input[name='user_pwd']").val();

            //验证用户名为空
            if( user_name=="")
            {
                alert('用户名不能为空');
                return false;
            }
            //验证密码
            reg=/^[0-9]{6,16}$/;
            if(user_pwd==""){
                alert('密码不能为空');
                return false;
            }
            $.ajax({
                type:'post',
                data:{user_name:user_name,user_pwd:user_pwd},
                url:"/index/loginDo",
                dataType:"json",
                success:function(msg){
                    if(msg.code==1){
                        alert(msg.msg);
                        location.href="/index/index";
                    }else{
                        alert(msg.msg);
                    }
                }
            })
            return false;
        })
    })
</script>
