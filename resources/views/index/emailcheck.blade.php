
@extends('index/master')
@section('title')
    找回密码
@endsection
@section('content')

    <div class="login" style="background:url(images/12.jpg) right center no-repeat #fff">
        <h2>找回密码————验证邮箱</h2>

            <div>
                <p class="formrow">
                    <label class="control-label" for="register_email">用户邮箱</label>
                    <input type="text" name="user_email" placeholder="请输入用户邮箱" style="width:300px; height:40px;">
                    <button id="set" class="uploadbtn ub1"  style="width:100px; height:40px;">发送验证码</button>
                </p>

            </div>
            <div>
                <p class="formrow">
                    <label class="control-label" for="register_email" >验证码</label>
                    <input type="password" name="code"  style="width:200px; height:40px;"  placeholder="请输入验证码">
                </p>
            </div>
            <div class="loginbtn">
                <button id="submit" class="uploadbtn ub1" style="width:200px; height:40px;">下一步</button>
            </div>


        <div class="hezuologo">


        </div>
    </div>

@endsection
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script>
    $(function(){

        //点击发送验证码
      $('#set').click(function(){
          var user_email=$("input[name='user_email']").val();

          //验证用户名为空
          if( user_email=="")
          {
              alert('邮箱不能为空');
              return false;
          }
          $.ajax({
              type:'post',
              data:{user_email:user_email},
              url:"/index/emailcheckDo",
              dataType:"json",
              success:function(msg){
                  if(msg.code==1){
                      alert(msg.msg);
                  }else{
                      alert(msg.msg);
                      window.location.reload();
                  }
              }
          })
          $('#set').text(60+'s');
          //定义一个全局变量
          _time=setInterval(secondLess,1000);
          //倒计时 封装的方法
          function secondLess(){
              //获得当前秒数（span里的值）
              var second=parseInt($('#set').text());
              if(second==0){
                  $('#set').text('获取');
                  //关闭计时器
                  clearInterval(_time);
              }else{
                  second=second-1;
                  $('#set').text(second+'s');
              }
          }
      })
        //点击下一步
       $('#submit').click(function(){
           var code=$("input[name='code']").val();
           var user_email=$("input[name='user_email']").val();
           //验证用户名为空
           if( user_email=="")
           {
               alert('邮箱不能为空');
               return false;
           }
           //验证用户名为空
           if( code=="")
           {
               alert('验证码不能为空');
               return false;
           }
           $.ajax({
               type:'post',
               data:{user_email:user_email,code:code},
               url:"/index/codecheck",
               dataType:"json",
               success:function(msg){
                   if(msg.code==1){
                       alert(msg.msg);
                       location.href="/index/password?user_email="+user_email;
                   }else{
                       alert(msg.msg);
                   }
               }
           })

       })

    })
</script>
