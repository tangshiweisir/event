@extends('admin.techerindex')
@section('content')
        <form class="layui-form" action="/admin/teacher/create" method="post" style="margin-top: 20px;" >
            <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="t_name" required  lay-verify="required" placeholder="请输入姓名" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                    <input type="password" name="t_pwd" required lay-verify="required" placeholder="请输入密码" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">简介</label>
                <div class="layui-input-block">
                    <textarea name="t_desc" placeholder="请输入简介" class="layui-textarea"></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">讲师风格</label>
                <div class="layui-input-block">
                    <select name="t_style" lay-verify="required">
                        <option value=""></option>
                        <option value="1">理智型</option>
                        <option value="2">情感型</option>
                        <option value="3">自然型</option>
                        <option value="4">幽默型</option>
                        <option value="5">技巧型</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即申请</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>

@endsection
@section('js')
<script>
    //JavaScript代码区域
    layui.use(['element','form'], function(){
        var element = layui.element;
        var form = layui.form;

        //提交
        form.on('submit(formDemo)', function(data){
            $.ajax({
                url:"/admin/teacher/create",
                type:'POST',
                data:data.field,
                success:function(res){
                    if(res.code == 200){
                        layer.open({
                            content: res.msg
                            ,btn: ['申请成功', '返回继续申请']
                            ,yes: function(index, layero){
                                location.href = "/admin/teacher/create";
                            }
                            ,btn2: function(index, layero){
                                location.href = "/admin/teacher/create";
                            }
                        });
                    }else{
                        layer.open({
                            icon: 2,
                            content: res.msg
                        });
                    }
                }
            });
            return false;
        });
    });
</script>
@endsection