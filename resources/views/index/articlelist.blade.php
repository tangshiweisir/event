@extends('index/master')
@section('title')
    咨询详情
@endsection
@section('content')

<div class="coursecont">
<div class="coursepic">
	<h3 class="righttit">全部资讯</h3>
    <div class="clearh"></div>
    <span class="bread nob">
        <a class="fombtn cur" href="articlelist.html">全部资讯</a>
        <a class="fombtn" href="articlelist.html">热门资讯</a>
        <a class="fombtn" href="articlelist.html">考试指导</a>
        <a class="fombtn" href="articlelist.html">精彩活动</a>
    </span>
    
</div>
<div class="clearh"></div>
<div class="coursetext">
    @foreach($data as $k=>$v)
	<div class="articlelist">
    	<h3><a class="artlink" href="{{url('/index/article')}}">{{$v->a_name}}</a></h3>
        <p>{{$v->a_desc}}</p>
        <p class="artilabel">
        <span class="ask_label">热门资讯</span>
        <b class="labtime">{{date('Y-m-d',$v->c_time)}}</b>
        </p>
        <div class="clearh"></div>
    </div>
    @endforeach


    
    
	<div class="clearh" style="height:20px;"></div>
	<span class="pagejump">
    	<p class="userpager-list" style="float: right">
       	  {{ $data->links() }}
        </p>
    </span>
    <div class="clearh" style="height:10px;"></div>
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">热门资讯</h3>
    <div class="gonggao">
	<ul class="hotask">
        @foreach($left as $k=>$v)
        	<li><a class="ask_link" href="#"><strong>●</strong>{{$v->a_name}}</a></li>
            @endforeach
        </ul>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">推荐课程</h3>
    <div class="teacher">
    <div class="teapic">
        <a href="#"  target="_blank"><img src="images/c1.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="ask_link" target="_blank">财经法规与财经职业道德</a></h3>
    </div>
    <div class="clearh"></div>
    <div class="teapic">
        <a href="#"  target="_blank"><img src="images/c2.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="ask_link" target="_blank">财经法规与财经职业道德</a></h3>
    </div>
    <div class="clearh"></div>
    <div class="teapic">
        <a href="#"  target="_blank"><img src="images/c3.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="ask_link" target="_blank">财经法规与财经职业道德</a></h3>
    </div>
    <div class="clearh"></div>
    </div>
    </div>
</div>
   
</div>



<div class="clearh"></div>
</div>
<!-- InstanceEndEditable -->


@endsection
