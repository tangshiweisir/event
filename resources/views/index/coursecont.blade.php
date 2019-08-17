<!doctype html>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>课程详情</title>
    <link rel="stylesheet" href="css/course.css"/>
    <link rel="stylesheet" href="css/register-login.css"/>
    <script src="js/jquery-1.8.0.min.js"></script>
    <link rel="stylesheet" href="css/tab.css" media="screen">
    <script src="js/jquery.tabs.js"></script>
    <script src="js/mine.js"></script>
    <script type="text/javascript">
        $(function(){

            $('.demo2').Tabs({
                event:'click'
            });
            $('.demo3').Tabs({
                event:'click'
            });
        });
    </script>

    <!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->

</head>

<body>

<div class="head" id="fixed">
    <div class="nav">
        <span class="navimg"><a href="index.html"><img border="0" src="images/logo.png"></a></span>
        <ul class="nag">
            <li><a href="{{url('/index/courselist')}}" class="link1 current">课程</a></li>
            <li><a href="{{url('/index/articlelist')}}" class="link1">资讯</a></li>
            <li><a href="{{url('/index/teacherlist')}}" class="link1">讲师</a></li>
            <li><a href="exam_index.html" class="link1" target="_blank">题库</a></li>
            <li><a href="askarea.html" class="link1" target="_blank">问答</a></li>

        </ul>
        <span class="massage">
            <!--<span class="select">
        	<a href="#" class="sort">课程</a>
        	<input type="text" value="关键字"/>
            <a href="#" class="sellink"></a>
            <span class="sortext">
            	<p>课程</p>
                <p>题库</p>
                <p>讲师</p>
            </span>
        </span>-->
            <!--未登录-->
            @if(session('user_id') == "")
                <span class="exambtn_lore">
                     <a class="tkbtn tklog" href="login.html">登录</a>
                     <a class="tkbtn tkreg" href="register.html">注册</a>
                </span>
            @endif
            <!--登录后-->
            <!--<div class="logined">
                <a href="mycourse.html"  onMouseOver="logmine()" style="width:70px" class="link2 he ico" target="_blank">sherley</a>
                <span id="lne" style="display:none" onMouseOut="logclose()" onMouseOver="logmine()">
                    <span style="background:#fff;">
                        <a href="mycourse.html" style="width:70px; display:block;" class="link2 he ico" target="_blank">sherley</a>
                    </span>
                    <div class="clearh"></div>
                    <ul class="logmine" >
                        <li><a class="link1" href="#">我的课程</a></li>
                        <li><a class="link1" href="#">我的题库</a></li>
                        <li><a class="link1" href="#">我的问答</a></li>
                        <li><a class="link1" href="#">退出</a></li>
                    </ul>
                </span>
            </div>-->

        </span>
    </div>
</div>
<!-- InstanceBeginEditable name="EditRegion1" -->


<div class="coursecont">
    <div class="coursepic1">
        <div class="coursetitle1">
            <h2 class="courseh21">{{$course->course_name}}</h2>
            <div  style="margin-top:-40px;margin-right:25px;float:right;">
                <div class="bdsharebuttonbox">
                    <a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
                    <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
                    <a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
                    <a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
                    <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
                    <a href="#" class="bds_more" data-cmd="more"></a>
                    <a class="bds_count" data-cmd="count"></a>
                </div>
                <script>
                    window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"24"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                </script>
            </div>
        </div>
        <div class="course_img1">
            <img src="{{asset($course->course_img)}}" height="140">
        </div>
        <div class="course_xq">
            <span class="courstime1"><p>课时<br/><span class="coursxq_num">{{$course->course_hour}}课时</span></p></span>
            <span class="courstime1"><p>学习人数<br/><span class="coursxq_num">{{$course->start_people}}人</span></p></span>
            <span class="courstime1"><p style="border:none;">课程时长<br/><span class="coursxq_num">{{$course->hour_duration}}分</span></p></span>
        </div>
        <div class="course_xq2">
            <a class="course_learn" href="{{url('/index/video')}}">开始学习</a>
        </div>
        <div class="clearh"></div>
    </div>

    <div class="clearh"></div>
    <div class="coursetext">
        <div class="box demo2" style="position:relative">
            <ul class="tab_menu">
                <li class="current course1">章节</li>
                <li class="course1">评价</li>
                <li class="course1">问答</li>
                <li class="course1">资料区</li>
            </ul>
            <!--<a class="fombtn" style=" position:absolute; z-index:3; top:-10px; width:80px; text-align:center;right:0px;" href="#">下载资料包</a>-->
            <div class="tab_box">
                <div>
                    <dl class="mulu noo">
                    @foreach($section as $k=>$v)
                        <div>
                            <dt class="mulu_title"><span class="mulu_img"></span>第{{$k+1}}章&nbsp;&nbsp;{{$v->section_name}}
                                <span class="mulu_zd">+</span></dt>
                               
                            <div class="mulu_con">
                            @foreach($v->arr as $kk=>$vv)
                                <dd class="smalltitle"><strong>第{{$kk+1}}节&nbsp;&nbsp;{{$vv->lesson_name}}</strong></dd>
                                @foreach($vv->arr as $kkk=>$vvv)
                                <a href="/index/open"><dd><strong class="cataloglink">课时{{$kkk+1}}：{{$vvv->hour_name}}</strong><i class="fini nn"></i></dd></a>
                                @endforeach
                            @endforeach
                            </div>
                           
                        </div>
                        @endforeach
                    </dl>
                </div>
                <div class="hide">
                    <div>
                        <div id="star">
                            <span class="startitle">请打分</span>
                            <ul>
                                <li><a href="javascript:;">1</a></li>
                                <li><a href="javascript:;">2</a></li>
                                <li><a href="javascript:;">3</a></li>
                                <li><a href="javascript:;">4</a></li>
                                <li><a href="javascript:;">5</a></li>
                            </ul>
                            <span></span>
                            <p></p>
                        </div>
                        <div class="c_eform">
                            <textarea rows="7" class="pingjia_con sss"></textarea>
                            <a href="#" class="fombtn fombtn1">发布评论</a>
                            <div class="clearh"></div>
                        </div>
                        <ul class="evalucourse">
                            <li>
                        	<span class="pephead"><img src="images/0-0.JPG" width="50" title="候候">
                            <p class="pepname">候候候候</p>
                            </span>
                                <span class="pepcont"><p>2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013试真3年国家公。</p>
                            <p class="peptime pswer">2015-01-02</p></span>
                            </li>
                            <li>
                        	<span class="pephead"><img src="images/0-0.JPG" width="50" title="候候">
                            <p class="pepname">候候15kpiii</p>
                            </span>
                                <span class="pepcont"><p>2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公。</p>
                            <p class="peptime pswer">2015-01-02</p></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="hide">
                    <div>
                        <h3 class="">提问题</h3>
                        <div class="c_eform">
                            <textarea rows="7" class="pingjia_con title_con" placeholder="请输入问题的详细内容"></textarea>
                            <a id="fabu" class="fombtn">发布</a>
                            <div class="clearh"></div>
                        </div>
                        <ul class="evalucourse">
                            @foreach($arr as $k=>$v)
                                <li>
                                <span class="pephead"><img src="images/0-0.JPG" width="50" title="">
                                <p class="pepname">{{$data['user_name']}}</p>
                                </span>
                                    <span class="pepcont">
                                <p><a href="#" class="peptitle" target="_blank">{{$v['wen_content']}}</a></p>
                                <p class="peptime pswer">{{date("Y-m-d H:i",$v['c_time'])}}</p>
                                </span>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="hide">
                    <div>
                        <ul class="notelist" >
                            <li>
                                <p class="mbm mem_not"><a href="#" class="peptitle">1.rar</a></p>
                                <p class="gray"><b class="coclass">课时：<a href="#" target="_blank">会计的概念与目标1</a></b><b class="cotime">上传时间：<b class="coclass" >2015-05-8</b></b></p>

                            </li>
                            <li>
                                <p class="mbm mem_not"><a href="#" class="peptitle">资料.rar</a></p>
                                <p class="gray"><b class="coclass">课时：<a href="#" target="_blank">会计的概念与目标2</a></b><b class="cotime">上传时间：<b class="coclass" >2015-05-8</b></b></p>



                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="courightext">
        <div class="ctext">
            <div class="cr1">
                <h3 class="righttit">授课讲师</h3>
                <div class="teacher">
                    <div class="teapic ppi">
                        <a href="{{url('/index/teacher')}}" target="_blank"><img src="images/teacher.png" width="80" class="teapicy" title="张民智"></a>
                        <h3 class="tname"><a href="{{url('/index/teacher')}}" class="peptitle" target="_blank">{{$teacher->t_name}}</a><p style="font-size:14px;color:#666">会计讲师</p></h3>
                    </div>
                    <div class="clearh"></div>
                    <p>{{$teacher->t_desc}}</p>
                </div>
            </div>
        </div>

        <div class="ctext">
            <div class="cr1">
                <h3 class="righttit" onclick="reglog_open();">最新学员</h3>
                <div class="teacher zxxy">
                    <ul class="stuul">
                        <li><img src="images/0-0.JPG" width="60" title="张三李四"><p class="stuname">张三李四</p></li>
                        <li><img src="images/0-0.JPG" width="60" title="张三李四"><p class="stuname">张三李四</p></li>
                        <li><img src="images/0-0.JPG" width="60" title="张三李四"><p class="stuname">张三李四</p></li>
                        <li><img src="images/0-0.JPG" width="60" title="张三李四"><p class="stuname">张三李四</p></li>
                    </ul>
                    <div class="clearh"></div>
                </div>
            </div>
        </div>

        <div class="ctext">
            <div class="cr1">
                <h3 class="righttit">相关课程</h3>
                <div class="teacher">
                    <div class="teapic">
                        <a href="#"  target="_blank"><img src="images/c1.jpg" height="60" title="财经法规与财经职业道德"></a>
                        <h3 class="courh3"><a href="#" class="peptitle" target="_blank">财经法规与财经职业道德</a></h3>
                    </div>
                    <div class="clearh"></div>
                    <div class="teapic">
                        <a href="#"  target="_blank"><img src="images/c2.jpg" height="60" title="财经法规与财经职业道德"></a>
                        <h3 class="courh3"><a href="#" class="peptitle" target="_blank">财经法规与财经职业道德</a></h3>
                    </div>
                    <div class="clearh"></div>
                    <div class="teapic">
                        <a href="#"  target="_blank"><img src="images/c3.jpg" height="60" title="财经法规与财经职业道德"></a>
                        <h3 class="courh3"><a href="#" class="peptitle" target="_blank">财经法规与财经职业道德</a></h3>
                    </div>
                    <div class="clearh"></div>
                </div>
            </div>
        </div>

    </div>

    <div id="reglog">
        <span class="close"  onclick="reglog_close();">×</span>
        <div class="loginbox">
            <div class="demo3 rlog">
                <ul class="tab_menu rlog">
                    <li class="current">登录</li>
                    <li>注册</li>
                </ul>
                <div class="tab_box">
                    <div>
                        <form class="loginform pop">
                            <div>
                                <p class="formrow">
                                    <label class="control-label pop" for="register_email">帐号</label>
                                    <input type="text" class="popinput">
                                </p>
                                <span class="text-danger">请输入Email地址 / 用户昵称</span>
                            </div>

                            <div>
                                <p class="formrow">
                                    <label class="control-label pop" for="register_email">密码</label>
                                    <input type="password" class="popinput">
                                </p>
                                <p class="help-block"><span class="text-danger">密码错误</span></p>
                            </div>
                            <div class="clearh"></div>
                            <div class="popbtn">
                                <label><input type="checkbox" checked="checked"> <span class="jzmm">记住密码</span> </label>&nbsp;&nbsp;
                                <button type="submit" class="uploadbtn ub1">登录</button>

                            </div>
                            <div class="popbtn lb">
                                <a href="#" class="link-muted">还没有账号？立即免费注册</a>
                                <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                <a href="forgetpassword.html" class="link-muted">找回密码</a>
                            </div>


                            <div class="popbtn hezuologo">
                                <span class="hezuo z1">使用合作网站账号登录</span>
                                <div class="hezuoimg z1">
                                    <img src="images/hezuoqq.png" class="hzqq" title="QQ" width="40" height="40">
                                    <img src="images/hezuowb.png" class="hzwb" title="微博" width="40" height="40">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="hide" id="_reload_">
                        <div>
                            <form class="loginform pop">
                                <div>
                                    <p class="formrow">
                                        <label class="control-label pop" for="register_email">邮箱地址</label>
                                        <input type="text" class="popinput">
                                    </p>
                                    <span class="text-danger">请输入Email地址 / 用户昵称</span>
                                </div>
                                <div>
                                    <p class="formrow">
                                        <label class="control-label pop" for="register_email">昵称</label>
                                        <input type="text" class="popinput">
                                    </p>
                                    <span class="text-danger">请输入Email地址 / 用户昵称</span>
                                </div>
                                <div>
                                    <p class="formrow">
                                        <label class="control-label pop" for="register_email">密码</label>
                                        <input type="password" class="popinput">
                                    </p>
                                    <p class="help-block"><span class="text-danger">密码错误</span></p>
                                </div>
                                <div>
                                    <p class="formrow">
                                        <label class="control-label pop" for="register_email">确认密码</label>
                                        <input type="password" class="popinput">
                                    </p>
                                    <p class="help-block"><span class="text-danger">密码错误</span></p>
                                </div>
                                <button type="submit" class="uploadbtn ub1">注册</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="clearh"></div>
</div>
<!-- InstanceEndEditable -->
<div class="clearh"></div>
<div class="foot">
    <div class="fcontainer">
        <div class="fwxwb">
            <div class="fwxwb_1">
                <span>关注微信</span><img width="95" alt="" src="images/num.png">
            </div>
            <div>
                <span>关注微博</span><img width="95" alt="" src="images/wb.png">
            </div>
        </div>
        <div class="fmenu">
            <p><a href="#">关于我们</a> | <a href="#">联系我们</a> | <a href="#">优秀讲师</a> | <a href="#">帮助中心</a> | <a href="#">意见反馈</a> | <a href="#">加入我们</a></p>
        </div>
        <div class="copyright">
            <div><a href="/">谋刻网</a>所有&nbsp;晋ICP备12006957号-9</div>
        </div>
    </div>
</div>
<!--右侧浮动-->
<div class="rmbar">
	<span class="barico qq" style="position:relative">
	<div  class="showqq">
	   <p>官方客服QQ:<br>335049335</p>
	</div>
	</span>
    <span class="barico em" style="position:relative">
	  <img src="images/num.png" width="75" class="showem">
	</span>
    <span class="barico wb" style="position:relative">
	  <img src="images/wb.png" width="75" class="showwb">
	</span>
    <span class="barico top" id="top">置顶</span>
</div>
</body>

<!-- InstanceEnd --></html>
<script src="/layui/layui.js"></script>
<script>
    $(function(){
        layui.use('layer',function(){
            //评价
            $(".fombtn1").click(function(){
                var _text = $(".sss").val();
                $.ajax({
                    url:"/index/leaveMessage",
                    type:'POST',
                    data:{text:_text},
                    success:function(res){
                        if(res.code=='1'){
//                            console.log(res);
                            alert(res.font);
                            location.href='/index/login';
                        }else{
//                            console.log(res);
                            alert(res.font);
                            location.href='/index/coursecont';
                        }

                    }
                });
                return false;
            });
            var fabu = $("#fabu");
            fabu.click(function () {
                var content = $('.title_con').val();
                if(content == ""){
                    layer.msg("请填写你的问题",{icon:2});
                    return;
                }
                var user_id = '{{session('user_id')}}';
                if(user_id == ""){
                    layer.msg("系统检测到您还未登录",{icon:2});
                    return;
                }
                var course_id ='{{$course_id}}';
                // var _hide = $('.hide');
                $.ajax({
                    type: "post",
                    url: "/index/getcontent",
                    data: {course_id:course_id,user_id:user_id,content:content,'_token':'{{csrf_token()}}'},
                    success: function (res) {
                        if(res == 1){
                            layer.msg('提问成功，请耐心等待回答',{icon:1,time:1000},function () {
                                window.location.reload($('#_reload_'));
                            });
                        }else{
                            layer.msg('提问失败，',{icon:2,time:1000})
                        }
                    }
                });
            })
        })
    })
</script>