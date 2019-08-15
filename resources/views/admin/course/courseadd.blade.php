@extends("admin/userindex")
@section("content")
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead >
        <tr >
            <th>id</th>
            <th>姓名</th>
            <th>个人描述</th>
            <th>讲课风格</th>
            <th>审核</th>
        </tr>
        </thead>
        @foreach($data as $k=>$v)
            <tbody>
            <tr>
                <td class="t_id">{{$v['t_id']}}</td>
                <td>{{$v['t_name']}}</td>
                <td>{{$v['t_desc']}}</td>
                <td>{{$v['t_style']}}</td>
                <td>
                    <div class="layui-btn-group">
                        <button type="button" class="layui-btn layui-btn-sm pass">
                            <i class="layui-icon">√</i>
                        </button>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="layui-btn-group">
                        <button type="button" class="layui-btn layui-btn-sm nopass">
                            <i class="layui-icon">&#xe640;</i>
                        </button>
                    </div>
                </td>
            </tr>

<<<<<<< HEAD

            </tbody>
=======
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
>>>>>>> zcy
        @endforeach
    </table>
    <div class="page">
        {{--{{$data->appends(['type' => $type])->links()}}--}}
    </div>
@endsection
<script src="/js/jq.js"></script>
    <script>
        $(function () {
            layui.use('layer',function () {
                var pass = $(".pass");
                var nopass = $(".nopass");
                var search = $("#search");
                //通过审核
                pass.click(function () {
                    var t_id = $(this).parents('td').parent('tr').children('td').first().text();
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/user/auditteacher')}}",
                        data: {t_id:t_id,'_token':"{{csrf_token()}}",type:1},
                        success:function (res) {
                            if( res == 1 ){
                                layer.confirm('已审核通过，是否请列表查看详情？', {
                                    btn: ['确定','留在该页面'] //按钮
                                }, function(index){
                                    location.href = "/admin/user/teacherlist";
                                }, function(){
                                    history.go(0);
                                });
                            }else{
                                layer.msg("操作失败，请稍后重试",{icon:2});
                            }
                        }
                    });
                });
                //弹框
                function diag() {
                    var str=prompt("请写出审核失败的原因");
                    return str;
                }
                //审核失败
                nopass.click(function () {
                    var t_id = $(this).parents('td').parent('tr').children('td').first().text();
                    var audit_reason = diag();
                    if(audit_reason == ""){
                        layer.msg("请写出审核失败的原因");
                        return;
                    }
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/user/auditteacher')}}",
                        data: {t_id:t_id,audit_reason:audit_reason,'_token':"{{csrf_token()}}",type:2},
                        success:function (res) {
                            if( res == 1 ){
                                layer.msg("操作成功",{icon:1});
                                history.go(0);
                            }else{
                                layer.msg("操作失败，请稍后重试",{icon:2});
                            }
                        }
                    });
                });
                //搜索+分页
                // search.click(function () {
                //     var type=$("#t_name").val();
                //     $.ajax({
                {{--url:"{{url('admin/materiallist')}}",--}}
                // data:{type:type},
                // async:true,
                // success:function(res){
                //     $('.page').remove();
                //     $("body").html(res);
                // }
                // });
                // });



<<<<<<< HEAD





            });
        });

=======
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
 
<!-- <script>
Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
   
  });
});

 </script> -->
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
    });
>>>>>>> zcy

    </script>