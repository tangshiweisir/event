@extends("admin/techerindex")
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
        <th>讲师姓名</th>
        <th>个人描述</th>
        <th>讲课风格</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    @foreach($data as $k=>$v)

        <tbody>
        <tr>
            <td class="t_id">{{$v['t_id']}}</td>
            <td>{{$v['t_name']}}</td>
            <td>{{$v['t_desc']}}</td>
            <td>{{$v['t_style']}}</td>
            @if($v['audit'] == 1)
                <td><span style="color:green;">在职</span></td>
            @elseif($v['audit'] == 2)
                <td><a  href="{{url('admin/user/auditteacher')}}" style="color:red;">等待审核</a></td>
            @endif
            <td>
                <div class="layui-btn-group">
                    <button type="button" class="layui-btn nopass" >锁定</button>
                </div>
            </td>
        </tr>

        </tbody>
    @endforeach
</table>
@endsection

<script src="/layui/layui.js"></script>
<script src="/js/jq.js"></script>
<script>
    $(function () {
        layui.use('layer',function () {
            var nopass = $(".nopass");

            nopass.click(function () {
                var t_id = $(this).parents('td').parent('tr').children('td').first().text();

                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/user/teacherlist')}}",
                    data: {t_id:t_id,'_token':"{{csrf_token()}}"},
                    success:function (res) {
                        if( res == 1 ){
                            layer.msg('锁定成功', {
                                icon: 1,
                                time: 1000 //2秒关闭（如果不配置，默认是3秒）
                            }, function(){
                                history.go(0);
                            });
                        }else{
                            layer.msg("操作失败，请稍后重试",{icon:2});
                        }
                    }
                });
            });
        });
    });
</script>