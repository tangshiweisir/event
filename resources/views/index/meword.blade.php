<!doctype>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>谋刻职业教育在线测评与学习平台</title>
<link rel="stylesheet" href="/index/css/course.css"/>
<link rel="stylesheet" href="/index/css/member.css"/>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script src="/index/js/jquery.tabs.js"></script>
<script src="/index/js/mine.js"></script>
</head>
<body>
<div class="head" id="fixed">
    <div class="nav">
        <span class="navimg"><a href="index.html"><img border="0" src="{{url('images/logo.png')}}"></a></span>
        <ul class="nag">
            <li><a href="/index/courselist" class="link1 current">课程</a></li>
            <li><a href="/index/articlelist" class="link1">资讯</a></li>
            <li><a href="/index/teacherlist" class="link1">讲师</a></li>
            <li><a href="exam_index.html" class="link1" target="_blank">题库</a></li>
            <li><a href="askarea.html" class="link1" target="_blank">问答</a></li>

        </ul>
        {{--<span class="massage">--}}
        	{{--<span class="exambtn_lore">--}}
                 {{--<a class="tkbtn tklog" href="{{url('user/login')}}">登录</a>--}}
                 {{--<a class="tkbtn tkreg" href="{{url('user/register')}}">注册</a>--}}
            {{--</span>--}}
        </span>
    </div>
</div>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="clearh"></div>
<div class="membertab">
    <div class="memblist">
        <div class="membhead">
            <div style="text-align:center;"><img src="images/0-0.JPG" width="80" ></div>
            <div style="width:220px;text-align:center;">
                <p class="membUpdate mine">{{$data['user_name']}}</p>
                <p class="membUpdate mine"><a href="/index/upduser?user_id={{$data['user_id']}}">修改信息</a>&nbsp;|&nbsp;<a href="myrepassword.html">修改密码</a></p>
                <div class="clearh"></div>
            </div>
        </div>
        <div class="memb">

            <ul>
                <li><a class="mb1" href="/index/mycourse">我的课程</a></li>
                <li><a class="mb3" href="myask.html">我的问答</a></li>
                <li><a class="mb4" href="{{url('index/meword')}}">我的笔记</a></li>
                <li><a class="mb12" href="myhomework.html">我的作业</a></li>
                <li><a class="mb2" href="training_list.html" target="_blank">我的题库</a></li>
                <li><a class="mb5" href="{{url('index/logout')}}">退出</a></li>
            </ul>

        </div>



    </div>



    <div class="membcont">
        <div>
            <h3 class="mem-h3">我的笔记 &nbsp &nbsp   &nbsp   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp <a href="{{url('index/writeword')}}">添加笔记</a></h3>

        </div>

        <div class="box demo2" style="width:820px;">
            <div class="tab_box">
                <div>

                    <ul class="memb_course">
                        @foreach($res as $k=>$v)
                            <div>
                                <h2>{{$v->w_title}}</h2>
                                <h4>{{$v->w_content}}</h4>
                                <hr/>
                            </div>
                        @endforeach

                        <div style="height:10px;" class="clearfix"></div>
                    </ul>

                    <div class="hide">
                        <div>
                            <ul class="memb_course">

                                <li>
                                    <div class="courseli">
                                        <a href="video.html" target="_blank"><img width="230" src="{{url('images/c8.jpg')}}"></a>
                                        <p class="memb_courname"><a href="coursecont.html" class="blacklink">会计基础</a></p>
                                        <div class="mpp">
                                            <div class="lv" style="width:100%;"></div>
                                        </div>
                                        <p class="goon"><a href="coursecont.html"><span>查看课程</span></a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="courseli">
                                        <a href="video.html" target="_blank"><img width="230" src="{{url('images/c8.jpg')}}"></a>
                                        <p class="memb_courname"><a href="coursecont.html" class="blacklink">会计基础</a></p>
                                        <div class="mpp">
                                            <div class="lv" style="width:100%;"></div>
                                        </div>
                                        <p class="goon"><a href="coursecont.html"><span>查看课程</span></a></p>
                                    </div>
                                </li>



                                <div class="clearfix" style="height:10px;"></div>
                            </ul>

                        </div>
                    </div>
                    <div class="hide">
                        <div>
                            <ul class="memb_course">
                                <li>
                                    <div class="courseli mysc">
                                        <a href="video.html" target="_blank"><img width="230" src="{{url('images/c8.jpg')}}" class="mm"></a>
                                        <p class="memb_courname"><a href="video.html" class="blacklink">会计基础</a></p>
                                        <div class="mpp">
                                            <div class="lv" style="width:20%;"></div>
                                        </div>
                                        <p class="goon"><a href="#"><span>继续学习</span></a></p>
                                        <div class="mask"><span class="qxsc"  title="移除收藏">▬</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="courseli mysc">
                                        <a href="video.html" target="_blank"><img width="230" src="{{url('images/c8.jpg')}}" class="mm"></a>
                                        <p class="memb_courname"><a href="video.html" class="blacklink">会计基础</a></p>
                                        <div class="mpp">
                                            <div class="lv" style="width:20%;"></div>
                                        </div>
                                        <p class="goon"><a href="#"><span>继续学习</span></a></p>
                                        <div class="mask"><span class="qxsc"  title="移除收藏">▬</span></div>
                                    </div>
                                </li>
                                <div class="clearfix" style="height:10px;"></div>
                            </ul>
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
                    <span>关注微信</span><img width="95" alt="" src="{{url('images/num.png')}}">
                </div>
                <div>
                    <span>关注微博</span><img width="95" alt="" src="{{url('images/wb.png')}}">
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
	  <img src="{{url('images/num.png')}}" width="75" class="showem">
	</span>
        <span class="barico wb" style="position:relative">
	  <img src="{{url('images/wb.png')}}" width="75" class="showwb">
	</span>
        <span class="barico top" id="top">置顶</span>
    </div>
</body>

<!-- InstanceEnd --></html>