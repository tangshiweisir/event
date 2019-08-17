@extends("admin/userindex")
@section("content")
<div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<form class="layui-form" action="" >
   <input type="hidden" value="" id="image">
  <div class="layui-form-item">
    <label class="layui-form-label">课时名称</label>
    <div class="layui-input-inline">
      <input type="text" name="hour_name" required  lay-verify="required" placeholder="请输入课时名称" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课节名称</label>
    <div class="layui-input-inline">
      <select name="lesson_id" lay-verify="required" id='lesson_id' >
      <option value="">请选择</option>
      @foreach($data as $k=>$v)
        <option value="{{$v->lesson_id}}">{{$v->lesson_name}}</option>
      @endforeach
      </select>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo" id="submit">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>


      @endsection
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/index/js/ajaxfileupload.js"></script>
<script id="uploadContainer" name="content" style="width:100%;height:350px;display:none;" type="text/template"></script>
<script>
 $(function(){
    layui.use(['form','layer'], function(){
      var form = layui.form;
      var layer = layui.layer;
      //点击添加
      $('#submit').click(function(){
      
        var hour_name=$("input[name='hour_name']").val();
        var lesson_id=$("select[name='lesson_id']").val();
        $.ajax({
                    type:'post',
                    data:{hour_name:hour_name,lesson_id:lesson_id},
                    url:"/admin/user/hourAdd",
                    dataType:"json",
                    success:function(msg){
                        if(msg.status==1){
                            layer.msg(msg.msg);
                            location.reload();
                            // location.href="goodsAddShow";
                        }else{
                            layer.msg(msg.msg);
                            // location.href="goodsAddShow";
                        }
                    }

                })
//  return false;
    })
  })
 })
</script>