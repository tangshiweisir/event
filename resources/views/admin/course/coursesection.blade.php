@extends("admin/userindex")
@section("content")
<div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">课章名称</label>
    <div class="layui-input-inline">
      <input type="text" name="section_name" required  lay-verify="required" placeholder="请输入课章名称" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课程名称</label>
    <div class="layui-input-inline">
      <select name="course_id" lay-verify="required" id='course_id' >
      <option value="">请选择</option>
      @foreach($data as $k=>$v)
        <option value="{{$v->course_id}}">{{$v->course_name}}</option>
      @endforeach
      </select>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课章总括</label>
    <div class="layui-input-block">
      <input type="text" name="section_content" required  lay-verify="required" placeholder="请输入课章总括" autocomplete="off" class="layui-input">
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
<script>
 $(function(){
    layui.use(['form','layer'], function(){
      var form = layui.form;
      var layer = layui.layer;
      $('#submit').click(function(){
        var section_name=$("input[name='section_name']").val();
        var section_content=$("input[name='section_content']").val();
        var course_id=$("select[name='course_id']").val();
        $.ajax({
                    type:'post',
                    data:{section_name:section_name,section_content:section_content,course_id:course_id},
                    url:"/admin/user/sectionAdd",
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