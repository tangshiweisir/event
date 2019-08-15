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
                            <input type="hidden" value="{{$v->user_id}}" id="uid">
                            <div>
                                <h4 style="color: #9e362f">
                            课程《<span style="color: #3a87ad">{{$v['course_name']}}</span>》中提出的问题:
                                </h4>
                                <span period_id="{{$v['wen_id']}}" class="con">
                                    {{$v['user_name']}}:
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{$v['wen_content']}}
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

</script>
@endsection