@extends('admin/userindex')
@section('content')
    <form class="layui-form" action="/art/add_do" method="post">
        @csrf
        <div class="layui-form-item">
            <label class="layui-form-label">资讯标题</label>
            <div class="layui-input-block">
                <input type="text" name="a_name" required  lay-verify="required" placeholder="请输入资讯标题" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">是否入门</label>
            <div class="layui-input-block">
                <input type="radio" name="a_hot" value="0" title="是">
                <input type="radio" name="a_hot" value="1" title="否" checked>
            </div>
        </div>


        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">内容</label>
            <div class="layui-input-block">
                <textarea name="a_desc" placeholder="请输资讯入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <input type="submit" value="提交">
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