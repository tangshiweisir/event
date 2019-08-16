@extends('admin/techerindex')

@section('content')
    <div class="clearh"></div>
    <div class="membertab">
        <div class="membcont">
            <div>
                <h3 class="mem-h3" style="font-size: 30px;color: #3A3A3A">用户提交的问题：</h3>
            </div>
            <div class="box demo2" style="width:820px;">
                <div class="tab_box">
                    <div>
                        <ul class="memb_course">
                            @foreach($arr as $k=>$v)
                                <input type="hidden" value="{{$v['user_id']}}" class="uid">
                                <input type="hidden" value="{{$v['t_id']}}" class="tid">
                                <div style="margin:10px 25px 25px 25px;">
                                    <h4 style="color: #9e362f">
                                        课程《<span style="color: #3a87ad">{{$v['course_name']}}</span>》中提出的问题:
                                    </h4>
                                    <span style="margin-left:25px;" class="con">
                                        用户 <span style="color:green;">{{$v['user_name']}}
                                    </span>:
                                    <input type="hidden" value="{{$v['wen_id']}}" class="wen_id">
                                        {{$v['wen_content']}}
                                        <span value="sdasd" class="responseWen" style="color: #6ce26c;cursor:pointer">点击回答</span>
                                    <hr>
                                </span>
                                </div>
                            @endforeach
                            <div style="height:10px;" class="clearfix"></div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            layui.use('layer',function () {
                var responseWen = $('.responseWen');
                responseWen.click(function () {
                    // var wen_id = $('.wen_id').val();
                    var wen_id = $(this).prev('input').val();
                    var t_id = $('.tid').val();
                    var user_id = $('.uid').val();
                    $.ajax({
                        type:"post",
                        url:"/glteacher/replywen",
                        data:{wen_id:wen_id,t_id:t_id,user_id:user_id,'_token':'{{csrf_token()}}'},
                        success: function (res) {
                            console.log(res)
                        }
                    });
                });
            });
        })
    </script>
@endsection
