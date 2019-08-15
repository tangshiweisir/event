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


            </tbody>
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








            });
        });


    </script>