@extends('index/master')
<title>@section('title')我的问答@endsection</title>

<!-- InstanceBeginEditable name="EditRegion1" -->
@section('content')
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="clearh"></div>
<div class="membertab">
    <div class="memblist">
        <div class="membhead">
            <div style="text-align:center;"><img src="images/0-0.JPG" width="80" ></div>
            <div style="width:220px;text-align:center;">
                <p class="membUpdate mine">{{$data->user_name}}</p>
                <p class="membUpdate mine"><a href="{{url('index/upduser')}}/{{$data->user_id}}">修改信息</a>&nbsp;|&nbsp;<a href="{{url('user/updatepwd')}}/{{$data->u_id}}">修改密码</a></p>
                <div class="clearh"></div>
            </div>
        </div>
        <div class="memb">
            <ul>
                <li><a class="mb1" href="{{url('index/mycourse')}}">我的课程</a></li>
                <li  class="currnav"><a class="mb3" href="{{url('index/wen')}}">我的问答</a></li>
                <li><a class="mb4" href="{{url('index/meword')}}">我的笔记</a></li>
                <li><a class="mb5" href="{{url('index/logout')}}">退出登录</a></li>
            </ul>
        </div>
    </div>
    <div class="membcont">
        <div>
            <h3 class="mem-h3">我的问答</h3>
        </div>
        <div class="box demo2" style="width:820px;">
            <div class="tab_box">
                <div>
                    <ul class="memb_course">
                        <input type="hidden" value="{{$data->user_id}}" id="uid">
                        @foreach($arr as $k=>$v)
                            <div>
                                <h4 style="color: #9e362f">课程《<span style="color: #3a87ad">{{$v['course_name']}}</span>》中提出的问题:</h4>
                                <span period_id="{{$v['wen_id']}}" class="con">
                                    {{--{{$v['user_name']}}:--}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{$v['wen_content']}}

                                </span>
                            </div>
                            @foreach($arr2 as $kk=>$vv)
                                @if($vv['wen_id'] == $v['wen_id'])
                                <div>
                                    <p style="color: green">

                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        老师（{{$vv['t_name']}}）的回答:
                                    </p>
                                    <span id="qwe">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{$vv['r_content']}}
                                    </span>
                                    <hr/>
                                </div>
                                @endif
                            @endforeach
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
@endsection
    <!-- InstanceEndEditable -->
    @section('js')
        <script>

        </script>
@endsection