<div class="courseright" id="type">
    <div class="clearh"></div>
    <ul class="courseulr">
        @foreach($dataInfo as $v)
            <li>
                <div class="courselist">
                    <a href="/index/courseDetail?course_id={{$v->course_id}}"><img style="border-radius:3px 3px 0 0;" width="240" src="images/c1.jpg" title="会计基础"></a>
                    <p class="courTit"><a href="/index/courseDetail?course_id={{$v->course_id}}">{{$v->course_name}}</a></p>
                    <div class="gray">
                        <span>{{$v->course_hour}} {{$v->hour_duration}}分钟</span>
                        <span class="sp1">{{$v->start_people}}人学习</span>
                        <div style="clear:both"></div>
                    </div>
                </div>
            </li>

        @endforeach
        {{ $dataInfo->links() }}
    </ul>
</div>