@extends("admin/userindex")
@section("content")
<div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<form class="layui-form" action="">
   <input type="hidden" value="" id="image">
  <div class="layui-form-item">
    <label class="layui-form-label">课程名称</label>
    <div class="layui-input-inline">
      <input type="text" name="course_name" required  lay-verify="required" placeholder="请输入课程名称" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课程分类</label>
    <div class="layui-input-inline">
      <select name="course_type_id" lay-verify="required" id='course_type_id'>
      <option value="">请选择</option>
      @foreach($data as $k=>$v)
        <option value="{{$v->course_type_id}}">{{$v->course_type_name}}</option>
        @foreach($v->arr as $kk=>$vv)
          <option value="{{$vv->course_type_id}}">——{{$vv->course_type_name}}</option>
        @endforeach
      @endforeach
      </select>
      </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">封面上传</label>
    <button type="button" class="layui-btn" id="test1">
     <i class="layui-icon">&#xe67c;</i>上传图片
    </button>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课程课时</label>
    <div class="layui-input-inline">
      <input type="text" name="course_hour" required  lay-verify="required" placeholder="请输入课程课时" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课程金额</label>
    <div class="layui-input-inline">
      <input type="text" name="course_money" required  lay-verify="required" placeholder="请输入学习课程所付金额" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课程时长</label>
    <div class="layui-input-inline">
      <input type="text" name="hour_duration" required  lay-verify="required" placeholder="请输入课程时长" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">学习人数</label>
    <div class="layui-input-inline">
      <input type="text" name="start_people" required  lay-verify="required" placeholder="请输入学习人数" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">评论人数</label>
    <div class="layui-input-inline">
      <input type="text" name="course_speak_people" required  lay-verify="required" placeholder="请输入评论人数" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课程评分</label>
    <div class="layui-input-inline">
      <input type="text" name="course_speak_score" required  lay-verify="required" placeholder="请输入课程评分" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">是否精品</label>
    <div class="layui-input-block">
      <input type="radio" name="is_well" value="1" title="是" >
      <input type="radio" name="is_well" value="2" title="否" >
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课程讲师</label>
    <div class="layui-input-inline">
      <select name="t_id" lay-verify="required" id='t_id' >
      <option value="">请选择</option>
      @foreach($teacher as $k=>$v)
        <option value="{{$v->t_id}}">{{$v->t_name}}</option>
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
<script>
 $(function(){
    layui.use(['form','layer','upload'], function(){
      var form = layui.form;
      var layer = layui.layer;
      var upload = layui.upload;

      var uploadInst = upload.render({
         elem: '#test1' //绑定元素
          ,url: '/admin/user/image' //上传接口
          ,done: function(res){
            //上传完毕回调
            if(res.code==1){
              layer.msg(res.msg);
               $('#image').val(res.src);  
            }
          }
          ,error: function(){
            //请求异常回调
            layer.msg(上传失败);
          }
      });
      
      $('#submit').click(function(){
      //  layer.msg(12321);
          var image=$('#image').val();
          var course_name=$("input[name='course_name']").val();
          var course_hour=$("input[name='course_hour']").val();
          var course_money=$("input[name='course_money']").val();
          var hour_duration=$("input[name='hour_duration']").val();
          var start_people=$("input[name='start_people']").val();
          var course_speak_people=$("input[name='course_speak_people']").val();
          var course_speak_score=$("input[name='course_speak_score']").val();
          var is_well=$("input[name='is_well']:checked").val();
          var course_type_id=$("select[name='course_type_id']").val();
          var t_id=$("select[name='t_id']").val();
          //传数据
          $.ajax({
                    type:'post',
                    data:{image:image,course_name:course_name,course_hour:course_hour,course_money:course_money,hour_duration:hour_duration,start_people:start_people,course_speak_people:course_speak_people,course_speak_score:course_speak_score,is_well:is_well,course_type_id:course_type_id,t_id:t_id},
                    url:"/admin/user/courseAddDo",
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
          // return false;
      })
    })
  })
   </script>