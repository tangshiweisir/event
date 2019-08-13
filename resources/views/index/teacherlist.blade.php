@extends('index/master')
@section('title')
    讲师列表
@endsection
@section('content')


<div class="coursecont" style="background: none repeat scroll 0 0 #fff;border-radius: 3px;box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);" >
    <h3 class="righttit" style="padding-left:50px;">优秀讲师</h3>
	@foreach($data as $k=>$v)
	<div class="coursepic tecti">
		<div class="teaimg">
		<a href="/index/teacher?t_id={{$v->t_id}}" target="_blank"><img src="images/teacher.jpg" width="150"></a>
		</div>
		<div class="teachtext">
			<h3><a href="{{url('/index/teacher')}}" target="_blank" class="teatt">{{$v->t_name}}</a>&nbsp;&nbsp;<strong>&nbsp;&nbsp;讲师</strong></h3>
			<h4>个人简介</h4>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;{{$v->t_desc}}</p>
			<h4>授课风格</h4>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;{{$v->t_style}}</p>
		</div>
		<div class="clearh"></div>
	</div>
		@endforeach
</div>


@endsection
