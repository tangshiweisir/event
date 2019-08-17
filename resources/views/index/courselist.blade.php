@extends('index/master')
@section('title')
    课程列表
@endsection
@section('content')
    <div class="coursecont">
        <div class="courseleft">
	<span class="select">
      <input type="text" value="请输入关键字" class="pingjia_con"/>
      <a href="#" class="sellink"></a>
    </span>
            <ul class="courseul">
                <li class="curr" style="border-radius:3px 3px 0 0;background:#fb5e55;"><h3 style="color:#fff;"><a href="#" class="whitea">全部课程</a></h3>
                @foreach($data as $v)
                    <li>
                        <h4>{{$v->course_type_name}}</h4>
                        <ul class="sortul">


                            @foreach($v->arr as $kk=>$vv)
                                <li  class="check" course_type_id={{$vv->course_type_id}}><a href="#">{{$vv->course_type_name}}</a></li>
                            @endforeach

                        </ul>
                        <div class="clearh"></div>
                    </li>
                @endforeach
            </ul>
            <div style="height:20px;border-radius:0 0 5px 5px; background:#fff;box-shadow:0 2px 4px rgba(0, 0, 0, 0.1)"></div>
        </div>
        <div class="courseright" id="type">
            <div class="clearh"></div>
            <ul class="courseulr">
                @foreach($dataInfo as $v)
                    <li>
                        <div class="courselist">
                            <a href="/index/courseDetail?course_id={{$v->course_id}}" ><img style="border-radius:3px 3px 0 0;" width="240" src="{{asset($v->course_img)}}" title="会计基础"></a>
                            <p class="courTit"><a href="/index/courseDetail?course_id={{$v->course_id}}" >{{$v->course_name}}</a></p>
                            <div class="gray">
                                <span>{{$v->course_hour}} {{$v->hour_duration}}分钟</span>
                                <span class="sp1">{{$v->start_people}}人学习</span>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                    </li>

                @endforeach
                {{ $dataInfo->links() }}
            </ul>
        </div>
        <div class="clearh"></div>
    </div>
    </div>
@endsection
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script>
    $(function(){
        $('.check').click(function(){
//            alert(11)

            //$(this).siblings().prop("class","");
            $('.sortul').children("li").prop("class","");
            $(this).prop("class","course_curr");
            var course_type_id=$(this).attr('course_type_id');
            $.ajax({
                type:'get',
                data:{course_type_id:course_type_id},
                url:"/index/coursetypeshow",
                success:function(msg){
//                    console.log(msg);
                    $('#type').html(msg);
                }
            })

        })
    })
</script>



