@extends('index/master')
<title>@section('title')我的笔记@endsection</title>
<!-- InstanceBeginEditable name="EditRegion1" -->
{{--<span class="massage">--}}
{{--<span class="exambtn_lore">--}}
{{--<a class="tkbtn tklog" href="{{url('user/login')}}">登录</a>--}}
{{--<a class="tkbtn tkreg" href="{{url('user/register')}}">注册</a>--}}
{{--</span>--}}
{{--</span>--}}
@section('content')
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
                <li ><a class="mb1" href="/index/mycourse">我的课程</a></li>
                <li><a class="mb3" href="/index/wen">我的问答</a></li>
                <li class="currnav"><a class="mb4" href="{{url('index/meword')}}">我的笔记</a></li>
                <li><a class="mb5" href="{{url('index/logout')}}">退出登录</a></li>
            </ul>
        </div>
    </div>
    <div class="membcont">
        <div>
            <h3 class="mem-h3" style="color:#5adf96;font-size: 20px;font-family: 楷体;">我的笔记 &nbsp &nbsp   &nbsp   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp
                <a href="{{url('index/writeword')}}" style="color:#649316;font-size: 20px;font-family: 楷体;">添加笔记</a></h3>
        </div>
        <div class="box demo2" style="width:820px;">
            <div class="tab_box">
                <div>
                    <ul class="memb_course">
                        @foreach($res as $k=>$v)
                            <div>
                                <h2 style="color:#649316;font-size: 20px;font-family: 楷体;">标题：{{$v->w_title}}</h2>
                                <h4 style="font-size: 15px;font-family: 仿宋;">内容：{{$v->w_content}}</h4>
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
</div>

@endsection
