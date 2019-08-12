@extends('admin/userindex')
@section('content')
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>资讯名称</th>
            <th>资讯内容</th>
            <th>是否上门</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k=>$v)
        <tr>
            <td>{{$v->a_name}}</td>
            <td>{{$v->a_desc}}</td>
            <td>@if($v->a_hot==0)是 @else 否 @endif</td>
            <td>userindex</td>
            <td><a href="/admin/art/del?a_id={{$v->a_id}}">删除</a>||<a href="/admin/art/up?a_id={{$v->a_id}}">修改</a></td>
        </tr>
            @endforeach
        <td colspan="5">{{ $data->links() }}</td>
        </tbody>
    </table>
@endsection