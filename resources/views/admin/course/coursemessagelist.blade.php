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
            <th>留言ID</th>
            <th>留言内容</th>
            <th>课时ID</th>
            <th>用户ID</th>
            <th>审核</th>
        </tr>
        </thead>
        @foreach($data as $k=>$v)
            <tbody>
            <tr>
                <td class="l_id">{{$v->l_id}}</td>
                <td>{{$v->l_contents}}</td>
                <td>{{$v->period_id}}</td>
                <td>{{$v->u_id}}</td>
                <td>
                    @if($v->status == 1)
                        &nbsp;&nbsp;审核通过&nbsp;&nbsp;&nbsp;&nbsp;
                    @elseif($v->status == 2)
                        &nbsp;&nbsp;审核未通过&nbsp;&nbsp;&nbsp;&nbsp;
                    @endif
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

            </tbody>
        @endforeach
    </table>
    <div class="page"></div>
@endsection
<script src="/js/jq.js"></script>
<script>
    $(function () {
        layui.use('layer',function () {
            var pass = $(".pass");
            var nopass = $(".nopass");
            //通过审核
            pass.click(function () {
                var l_id = $(this).parents('td').parent('tr').children('td').first().text();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/user/aduitMessage')}}",
                    data: {l_id:l_id,'_token':"{{csrf_token()}}",type:1},
                    success:function (res) {
                        if( res == 1 ){
                            layer.confirm('已审核通过，是否请列表查看详情？', {
                                btn: ['确定','留在该页面'] //按钮
                            }, function(index){
                                location.href = "/admin/user/coursemessageList";
                            }, function(){
                                history.go(0);
                            });
                        }else{
                            layer.msg("操作失败，请稍后重试",{icon:2});
                        }
                    }
                });
            });

            //审核失败
            nopass.click(function () {
                var l_id = $(this).parents('td').parent('tr').children('td').first().text();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/user/aduitMessage')}}",
                    data: {l_id:l_id,'_token':"{{csrf_token()}}",type:2},
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
        });
    });

</script>

