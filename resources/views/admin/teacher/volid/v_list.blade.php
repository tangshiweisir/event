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
            <th>视频名称</th>
            <th>视频</th>
            <th>视屏课程名称</th>
        </tr>
        </thead>
        @foreach($data as $k=>$v)

            <tbody>
            <tr>
                <td class="t_id">{{$v['v_id']}}</td>
                <td>{{$v['v_name']}}</td>
                <td><img src=storage_path."/app{{$v['v_video']}}" alt="anwu"></td>
                <td>{{$v['course_name']}}</td>
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