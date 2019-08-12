<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="/admin/login/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/admin/login/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="/admin/login/css/component.css" />
    <link rel="stylesheet" href="/layui/css/layui.css">
    <!--[if IE]>
    <script src="/admin/login/js/html5.js"></script>
    <![endif]-->
    <style>
        input::-webkit-input-placeholder{
            color:rgba(0, 0, 0, 0.726);
        }
        input::-moz-placeholder{   /* Mozilla Firefox 19+ */
            color:rgba(0, 0, 0, 0.726);
        }
        input:-moz-placeholder{    /* Mozilla Firefox 4 to 18 */
            color:rgba(0, 0, 0, 0.726);
        }
        input:-ms-input-placeholder{  /* Internet Explorer 10-11 */
            color:rgba(0, 0, 0, 0.726);
        }
    </style>
</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="logo_box">
                <h3>讲师登录</h3>
                <form class="layui-form">
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input name="t_name" class="text" style="color: #000000 !important" type="text" placeholder="请输入姓名">
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input name="t_pwd" class="text" style="color: #000000 !important; position:absolute; z-index:100;" value="" type="password" placeholder="请输入密码">
                    </div>
                    <div class="mb2">
                        <a class="act-but submit" lay-submit lay-filter="formDemo" style="color: #FFFFFF">登录</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/layui/layui.js"></script>
<script src="/admin/login/js/TweenLite.min.js"></script>
<script src="/admin/login/js/EasePack.min.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/admin/login/js/rAF.js"></script>
<script src="/admin/login/js/demo-1.js"></script>
<script src="/admin/login/js/Longin.js"></script>
<script>

    layui.use(['form','layer'],function(){
        var form = layui.form;
        var layer = layui.layer;

        //数据
        form.on('submit(formDemo)', function(data) {
            $.ajax({
                url: "/admin/teacher/login",
                type: 'POST',
                data: data.field,
                success: function (res) {

                    if(res.code == 200){
                        layer.msg(res.msg, {
                            icon: res.code,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                            location.href = "/admin/teacher/index";
                        });
                    }else{
                        layer.msg(res.msg,{icon:2});
                    }
                }
            });
            return false;
        })

    });


</script>
</body>
</html>

