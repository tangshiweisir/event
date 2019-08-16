@extends('index/master')
@section('title')
    视频列表
@endsection
@section('content')

<div class="coursecont">
<div class="coursepic">

@foreach($t_name as $k=>$v)
        <a href="http://123.cn/zhibo.html">{{$v['t_name']}}</a>
    @endforeach
    
</div>



    
    







@endsection
