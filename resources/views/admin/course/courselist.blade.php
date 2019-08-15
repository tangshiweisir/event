@extends('admin/userindex')
@section('content')

<div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<table class="layui-table">
  <colgroup>
    <col width="10">
    <col width="100">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>课程ID</th>
      <th>课程名称</th>
      <th>课程分类</th>
      <th>课程金额</th>
      <th>课程课时</th>
      <th>课程时长</th>
      <th>学习人数</th>
      <th>评价人数</th>
      <th>课程评分</th>
      <th>是否精品</th>
      <th>添加时间</th>
      <th>修改时间</th>
      <th>课程讲师</th>
      <th>编辑</th>
    </tr> 
  </thead>
  <tbody>
  @foreach($data as $k=>$v)
    <tr>
    <input type="hidden" id='course_id' value="{{$v->course_id}}">
      <th>{{$v->course_id}}</th>
      <th>{{$v->course_name}}</th>
      <th>{{$v->course_type_name}}</th>
      <th>{{$v->course_money}}元</th>
      <th>{{$v->course_hour}}课时</th>
      <th>{{$v->hour_duration}}分钟</th>
      <th>{{$v->start_people}}</th>
      <th>{{$v->course_speak_people}}</th>
      <th>{{$v->course_speak_score}}</th>
      <th>@if($v->is_well==1)是@else否@endif</th>
      <th>{{$v->c_time}}</th>
      <th>{{$v->u_time}}</th>
      <th>{{$v->t_name}}</th>
      <th><a href="">修改</a>
       <a href="" class="del" course_id="{{$v->course_id}}">删除</a>
      </th>
    </tr>
    @endforeach
   
  </tbody> 
</table>
    {{ $data->links() }}  @endsection
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/index/js/ajaxfileupload.js"></script>
<script>
 $(function(){
    layui.use(['form','layer'], function(){
      var form = layui.form;
      var layer = layui.layer;
       $('.del').click(function(){
        var  course_id = $(this).attr('course_id');
        $.ajax({
                    type:'post',
                    data:{course_id:course_id},
                    url:"/admin/user/courseDel",
                    dataType:"json",
                    success:function(msg){
                        if(msg.status==1){
                            layer.msg(msg.msg);
                            location.reload();
                            // location.href="goodsAddShow";
                        }else{
                            layer.msg(msg.msg);
                            location.reload();
                            
                        }
                    }

                })

         return false;
       })

     
    });

 })
</script>
