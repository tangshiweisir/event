@extends('index/master')
@section('title')
    课程简介
@endsection
@section('content')


    <div class="coursecont">
        <div class="coursepic">
            <div class="course_img"><img src="{{asset($data->course_img)}}" width="500"></div>
            <div class="coursetitle">
                <a class="state">更新中</a>

                <h2 class="courseh2">{{$data->course_name}}</h2>
                <p class="courstime">总课时：<span class="course_tt">{{$data->course_hour}}课时</span></p>
                <p class="courstime">课程时长：<span class="course_tt">{{$data->hour_duration}}分钟</span></p>
                <p class="courstime">学习人数：<span class="course_tt">{{$data->start_people}}人</span></p>
                <p class="courstime">讲师：{{$dataInfo->t_name}}</p>
                <p class="courstime">课程评价：<img width="71" height="14" src="images/evaluate5.png">&nbsp;&nbsp;<span class="hidden-sm hidden-xs">{{$data->course_speak_score}}分（{{$data->course_speak_people}}人评价）</span></p>
                <!--<p><a class="state end">完结</a></p>-->

                <span class="coursebtn"><a class="btnlink" href="/index/coursecont?course_id={{$data->course_id}}">加入学习</a><a class="codol fx" href="javascript:void(0);" onClick="$('#bds').toggle();">分享课程</a><a class="codol sc" href="#">收藏课程</a></span>
                <div style="clear:both;"></div>
                <div id="bds">
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
            <div class="clearh"></div>
        </div>

        <div class="clearh"></div>
        <div class="coursetext">
            <h3 class="leftit">课程简介</h3>
            <p class="coutex">本课程主要针对重新改版后的新大纲会计从业资格考试的学习，主要为零基础学生顺利通过会计从业考试而设立！内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。 本教程为2014最新版教材课程详细讲解，学完后可以直接考证，也可以提高会计业务基础知识</p>
            <div class="clearh"></div>
            <h3 class="leftit">课程目录</h3>
            <dl class="mulu">
            @foreach($section as $k=>$v)
                <dt><a href="/index/coursecont" class="graylink">第{{$k+1}}章&nbsp;&nbsp;{{$v->section_name}}</a></dt>
                <dd>{{$v->section_content}}</dd>
            @endforeach

            
            </dl>
        </div>

        <div class="courightext">
            <div class="ctext">
                <div class="cr1">
                    <h3 class="righttit">授课讲师</h3>
                    <div class="teacher">
                        <div class="teapic ppi">
                            <a href="{{url('/index/teacher')}}" target="_blank"><img src="images/teacher.png" width="80" class="teapicy" title="张民智"></a>
                            <h3 class="tname"><a href="{{url('/index/teacher')}}" class="peptitle" target="_blank">{{$dataInfo->t_name}}</a><p style="font-size:14px;color:#666">会计讲师</p></h3>
                        </div>
                        <div class="clearh"></div>
                        <p>{{$dataInfo->t_desc}}</p>
                    </div>
                </div>
            </div>

            <div class="ctext">
                <div class="cr1">
                    <h3 class="righttit">课程公告</h3>
                    <div class="gonggao">
                        <div class="clearh"></div>
                        <p>人所缺乏的不是才干而是志向，不是成功的能力而是勤劳的意志。<br/>
                            <span class="gonggao_time">2014-12-12 15:01</span>
                        </p>
                        <div class="clearh"></div>
                        <p>请学习的同学在每节课学习后务必做完当节课的测试！<br/>
                            <span class="gonggao_time">2014-12-12 15:01</span>
                        </p>
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



        <div class="clearh"></div>
    </div>


@endsection