<!doctype html>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/index/css/course.css"/>
    <link rel="stylesheet" href="/index/css/tab.css" media="screen">
    <link rel="stylesheet" href="/index/css/register-login.css"/>
    <link rel="stylesheet" href="/index/css/member.css"/>
    <link rel="stylesheet" href="/index/css/article.css">
    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <script src="/index/js/jquery.tabs.js"></script>
    <script src="/index/js/mine.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.demo2').Tabs({
                event:'click'
            });
        });
    </script>
</head>

<body>

<div class="head" id="fixed">
	<div class="nav">
    	<span class="navimg"><a href="{{url('/index/index')}}"><img border="0" src="images/logo.png"></a></span>
        <ul class="nag">
        	<li><a href="{{url('/index/courselist')}}" class="link1 current">课程</a></li>
            <li><a href="{{url('/index/articlelist')}}" class="link1">资讯</a></li>
            <li><a href="{{url('/index/teacherlist')}}" class="link1">讲师</a></li>
            <li><a href="exam_index.html" class="link1" target="_blank">题库</a></li>
            <li><a href="/index/wen" class="link1" target="_blank">问答</a></li>

        </ul>
    </div>
</div>

@yield('content')


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
@yield('js')