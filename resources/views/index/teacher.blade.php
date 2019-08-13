@extends('index/master')
@section('title')
    讲师详情
@endsection
@section('content')


<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">

	@foreach($res as $k=>$v)
<div class="coursepic tecti">
	<div class="teaimg">
    <img src="images/teacher.jpg" width="150"> 
    </div>
    <div class="teachtext">
		<a href="http://123.cn/zhibo/zhibo_rtmp/zhibo.html">看看ta的直播</a>
    	<h3>{{$v->t_name}}<strong>&nbsp;&nbsp;讲师</strong></h3>
        <h4>个人简介</h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;{{$v->t_desc}}</p>
        <h4>授课风格</h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;{{$v->t_style}}</p>
    </div>
    <div class="clearh"></div>
</div>
	@endforeach

<div class="clearh"></div>

<div class="tcourselist">
<h3 class="righttit" style="padding-left:50px;">在教课程</h3>
<ul class="tcourseul">
	<li>
	    <span class="courseimg tcourseimg"><a href="{{url('/index/coursecont')}}" target="_blank"><img width="230" src="images/c8.jpg"></a></span>
	    <span class="tcoursetext">
	       <h4><a href="{{url('/index/coursecont')}}" target="_blank" class="teatt">会计从业资格会计基础</a><a class="state">更新中</a></h4>
	       <p class="teadec">会计从业资格会计基础会计从业资格会计基础会计础会计从业资格会计基础会计从业资格会计基础会计础会计从业资格会计基础会计从业资格会计基础会计础</p>
	       <p class="courselabel clock">30课时 600分钟<span class="courselabel student">2555人学习</span><span class="courselabel pingjia">评价：<img width="71" height="14" src="images/evaluate.png" data-bd-imgshare-binded="1"></span></p>
	   </span>
	   <div style="height:0" class="clearh"></div>
	</li>
<div class="clearh"></div>
</ul>
</div>


@endsection