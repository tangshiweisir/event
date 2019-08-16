@extends('admin.techerindex')
@section('title')
    直播开启
@endsection
@section('content')

        <form class="layui-form" action="/admin/t_open/open_do" method="post" style="margin-top: 20px;" enctype="multipart/form-data">
            <h1 style="color: red">您的直播房间号为：{{$str1}}</h1>
            <input type="hidden" name="t_id"value="{{$t_id}}">

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <input type="submit" value="立即开启">

                </div>
            </div>
        </form>

@endsection