@extends('index/master')
<title>@section('title')我的课程@endsection</title>

<!-- InstanceBeginEditable name="EditRegion1" -->
@section('content')
<div class="clearh"></div>
<div class="membertab">
<div class="memblist">
	<div class="membhead">
    <div style="text-align:center;"><img src="images/0-0.JPG" width="80" ></div>
    <div style="width:220px;text-align:center;">
    <p class="membUpdate mine">{{$user_info['user_name']}}</p>
    <p class="membUpdate mine"><a href="/index/upduser?user_id={{$user_info['user_id']}}">修改信息</a>&nbsp;|&nbsp;<a href="myrepassword.html">修改密码</a></p>
    <div class="clearh"></div>
    </div>
    </div>
    <div class="memb">
    <ul >
    	<li class="currnav"><a class="mb1" href="mycourse.html">我的课程</a></li>
		<li><a class="mb3" href="/index/wen">我的问答</a></li>
		<li><a class="mb4" href="{{url('index/meword')}}">我的笔记</a></li>
        <li><a class="mb5" href="{{url('index/logout')}}">退出登录</a></li>
   </ul>
    </div>
  </div>
	<div class="membcont">
        <h3 class="mem-h3">我的课程</h3>
        <div class="box demo2" style="width:820px;">
			<ul class="tab_menu" style="margin-left:30px;">
				<li class="current">学习中</li>
				<li>已学完</li>
				<li>收藏</li>
			</ul>
			<div class="tab_box">
				<div>
					<ul class="memb_course">
                        {{--正在学习--}}
                        @foreach($usercourse as $k=>$v)
                            <li>
                                <div class="courseli">
                                <a href="/index/courseDetail?course_id={{$v->course_id}}" target="_blank"><img width="230" src="images/c3.jpg"></a>
                                <p class="memb_courname"><a href="/index/courseDetail?course_id={{$v->course_id}}" class="blacklink">{{$v->course_name}}</a></p>
                                <div class="mpp">
                                    <div class="lv" style="width:20%;"></div>
                                </div>
                                <p class="goon"><a href="/index/courseDetail?course_id={{$v->course_id}}"><span>继续学习</span></a></p>
                                </div>
                            </li>
                        @endforeach
                        <div style="height:10px;" class="clearfix"></div>
                    </ul>
				</div>
				<div class="hide">
					<div>
                    {{--已学完    --}}
					<ul class="memb_course">
                        @foreach($usercoursed as $k=>$v)
                        <li>
                            <div class="courseli">
                            <a href="/index/courseDetail?course_id={{$v->course_id}}" target="_blank"><img width="230" src="images/c5.jpg"></a>
                            <p class="memb_courname"><a href="/index/courseDetail?course_id={{$v->course_id}}" class="blacklink">{{$v->course_name}}</a></p>
							<div class="mpp">
                                <div class="lv" style="width:100%;"></div>
                            </div>
                            <p class="goon"><a href="/index/courseDetail?course_id={{$v->course_id}}"><span>查看课程</span></a></p>
                            </div>
                        </li>
                        @endforeach
                        <div class="clearfix" style="height:10px;"></div>
                    </ul>
				</div>
				</div>
				<div class="hide">
					<div>
                    {{--收藏    --}}
					<ul class="memb_course">
                        @foreach($usercollect as $k=>$v)
                        <li>
                            <div class="courseli mysc">
                            <a href="/index/courseDetail?course_id={{$v->course_id}}" target="_blank"><img width="230" src="images/c7.jpg" class="mm"></a>
                            <p class="memb_courname"><a href="/index/courseDetail?course_id={{$v->course_id}}" class="blacklink">{{$v->course_name}}</a></p>
                            <div class="mpp">
                                <div class="lv" style="width:20%;"></div>
                            </div>
                            <p class="goon"><a href="/index/courseDetail?course_id={{$v->course_id}}"><span>继续学习</span></a></p>
							<div class="mask"><span class="qxsc"  title="移除收藏">▬</span></div>
                            </div>
                        </li>
                        @endforeach
                        <div class="clearfix" style="height:10px;"></div>
                    </ul>
				</div>
				</div>
				
			</div>
		</div>
</div>
<div class="clearh"></div>
</div>
@endsection