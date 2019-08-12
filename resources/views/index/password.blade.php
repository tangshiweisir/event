
@extends('index/master')
@section('title')
    找回密码
@endsection
@section('content')

    <div class="login" style="background:url(images/12.jpg) right center no-repeat #fff">
        <h2>找回密码————修改密码</h2>
        <div>
            <input type="hidden" id="user_email" value="{{$user_email}}">
            <p class="formrow">
                <label class="control-label" for="register_email">新密码</label>
                <input type="password" name="user_pwd" placeholder="请设置新密码" style="width:300px; height:40px;">
            </p>

        </div>
        <div>
            <p class="formrow">
                <label class="control-label" for="register_email">确定新密码</label>
                <input type="password" name="user_pwd1" placeholder="再次输入密码" style="width:300px; height:40px;">
            </p>

        </div>
        <div class="loginbtn">
            <button id="submit" class="uploadbtn ub1" style="width:200px; height:40px;">修改</button>
        </div>

    </div>

@endsection
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script>
    $(function(){
        //点击修改
        $('#submit').click(function(){
            var user_pwd=$("input[name='user_pwd']").val();
            var user_pwd1=$("input[name='user_pwd1']").val();
            var user_email=$("#user_email").val();

            //验证密码
            reg=/^[0-9]{6,16}$/;
            if(user_pwd==""){
                alert('密码不能为空');
                return false;
            }else if(!reg.test(user_pwd)){
                alert('密码请输入6-16位数字');
                return false;
            }
            //验证确认密码
            if(user_pwd1==""){
                alert('确认密码不能为空');
                return false;
            }else if(user_pwd1 !== user_pwd){
                alert('密码与确认密码不一致');
                return false;
            }
            $.ajax({
                type:'post',
                data:{user_email:user_email,user_pwd:user_pwd},
                url:"/index/passwordDo",
                dataType:"json",
                success:function(msg){
                    if(msg.code==1){
                        alert(msg.msg);
                        location.href="/index/login";
                    }else{
                        alert(msg.msg);
                        location.href="/index/emailcheck";
                    }
                }
            })
        })

    })
</script>
