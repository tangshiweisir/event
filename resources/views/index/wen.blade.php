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
                <li><a class="mb3" href="{{url('index/wen')}}">我的问答</a></li>
                <li><a class="mb4" href="{{url('index/meword')}}">我的笔记</a></li>
                <li><a class="mb12" href="myhomework.html">我的作业</a></li>
                <li><a class="mb2" href="training_list.html" target="_blank">我的题库</a></li>
            </ul>
        </div>
    </div>
    <div class="membcont">
        <div>
            <h3 class="mem-h3">我的问答 &nbsp &nbsp   &nbsp   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp </h3>
        </div>
        <div class="box demo2" style="width:820px;">
            <div class="tab_box">
                <div>
                    <ul class="memb_course">
                        <input type="hidden" value="{{$data->user_id}}" id="uid">
                        @foreach($arr as $k=>$v)
                            <div>
                                <h4 style="color: red">问:</h4>
                                <a href="#" period_id="{{$v['period_id']}}" class="con">
                                    {{$v['user_name']}}:
                                    {{$v['l_contents']}}
                                </a>
                            </div>
                        @endforeach
                        @foreach($arr2 as $k=>$v)
                            <div>
                                <p style="color: red">答:</p>
                                <a href="#" id="qwe">
                                    {{$v['t_name']}}:
                                    {{$v['r_content']}}
                                </a>
                            </div>
                        @endforeach
                        <div style="height:10px;" class="clearfix"></div>
                    </ul>
                    <div>
                        <textarea name="" id="content" cols="30" rows="10"></textarea><br>
                        {{--<a class="tkbtn tklog" id="btn" href="#">回复</a>&nbsp &nbsp   &nbsp   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp--}}
                        <a class="tkbtn tklog" id="stn" href="#">提交问题</a>
                    </div>
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
    $('#stn').click(function () {
        var $content=$('#content').val();
        var $uid=$('#uid').val();
        if($content==""){
            alert('不可以提交空问题');
            return false;
        }
        $.ajax({
            type:"post",
            url:"{{url("index/getcontent")}}",
            data:{content:$content,uid:$uid},
            dataType:"json",
            success:function(res){
                if(res==1){
                    alert('发送成功');
                    window.location.reload();
                }else{
                    alert('发送失败');
                    return false;
                }
            }
        })
    });
    $(document).on('click','.con',function(){
        var con=$(this).attr('period_id');

    });
    $('#btn').click(function () {
        if(con==""){
            alert('请选择要回答的问题');
            return false;
        }
        var $content=$('#content').val();
        var $uid=$('#uid').val();
        if($content==""){
            alert('不可以回答空答案');
            return false;
        }
        $.ajax({
            type:"post",
            url:"{{url("/index/getcontent")}}",
            data:{content:$content,uid:$uid,con:con},
            dataType:"json",
            success:function(res){
                if(res==1){
                    alert('发送成功');
                    window.location.reload();
                }else{
                    alert('发送失败');
                    return false;
                }
            }
        })
    })
</script>
@endsection