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

        </tr>
        </thead>
            <tbody>
            <tr>
                <td>{{$data['t_name']}}</td>
                <td>{{$data['t_desc']}}</td>
                <td>{{$data['t_style']}}</td>

            </tr>

            </tbody>
    </table>
    <div class="page">
        {{--{{$data->appends(['type' => $type])->links()}}--}}
    </div>
@endsection
<script src="/js/jq.js"></script>
<script>
</script>


