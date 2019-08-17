@extends('admin.techerindex')
@section('title')
    视频添加
@endsection
@section('content')
        <form class="layui-form" action="/admin/volid/vliodadd_do" method="post" style="margin-top: 20px;" enctype="multipart/form-data">
            <div class="layui-form-item">
                <label class="layui-form-label">视频名称</label>
                <div class="layui-input-block">
                    <input type="text" name="v_name" required  lay-verify="required" placeholder="给视频一个好听的昵称" class="layui-input">
                </div>
            </div>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000000">
            <div class="layui-form-item">
                <label class="layui-form-label">请选择课程</label>
                <div class="layui-input-block">
                    <select name="course_id" lay-verify="required">
                        <option value=""></option>
                        @foreach($data as $k=>$v)
                        <option value="{{$v->course_id}}">{{$v->course_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">视频</label>
                <div class="layui-input-inline">
                    <input type="file" name="v_video" required lay-verify="required" placeholder="请输入密码" class="layui-input">
                </div>
            </div>


            <div class="layui-form-item">
                <div class="layui-input-block">
                    <input type="submit" value="添加">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即申请</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
        <script>
            //Demo
            layui.use('form', function(){
                var form = layui.form;

                //监听提交
                form.on('submit(formDemo)', function(data){
                    layer.msg(JSON.stringify(data.field));
                    return false;
                });
            });
        </script>
@endsection