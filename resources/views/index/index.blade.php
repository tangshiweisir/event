<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>谋刻职业教育在线测评与学习平台</title>

	<script src="/index/js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/index/js/rev-setting-1.js"></script>
	<script type="text/javascript" src="/index/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<link rel="stylesheet" href="/index/css/style.css"/>
	<link rel="stylesheet" href="/index/css/tab.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/index/css/main.css" id="main-css">

	<!--课程选项卡-->
	<script type="text/javascript">
		function nTabs(thisObj,Num){
			if(thisObj.className == "current")return;
			var tabObj = thisObj.parentNode.id;
			var tabList = document.getElementById(tabObj).getElementsByTagName("li");
			for(i=0; i <tabList.length; i++)
			{
				if (i == Num)
				{
					thisObj.className = "current";
					document.getElementById(tabObj+"_Content"+i).style.display = "block";
				}else{
					tabList[i].className = "normal";
					document.getElementById(tabObj+"_Content"+i).style.display = "none";
				}
			}
		}
	</script>
</head>
<body>
<div class="head" id="fixed">
	<div class="nav">
		<span class="navimg"><a href="{{url('/index/index')}}"><img border="0" src="images/logo.png"></a></span>
		<ul class="nag">
			<li><a href="{{url('/index/courselist')}}" class="link1">课程</a></li>
			<li><a href="{{url('/index/articlelist')}}" class="link1">资讯</a></li>
			<li><a href="{{url('/index/open')}}" class="link1">直播</a></li>
			<li><a href="{{url('/index/teacherlist')}}" class="link1">讲师</a></li>
			<li><a href="exam_index.html" class="link1" target="_blank">题库</a></li>
			<li><a href="{{url('/index/wen')}}" class="link1" target="_blank">问答</a></li>
		</ul>
		<span class="massage">
				@if($user_info=="")
					<span class="exambtn_lore">
					<a class="tkbtn tklog" href="/index/login">登录</a>
					<a class="tkbtn tkreg" href="/index/register">注册</a>
					</span>
				@else
					<a href="{{url('index/mycourse')}}"  onMouseOver="logmine()" style="width:70px" class="link2 he ico" target="_blank">{{$user_info['user_name']}}</a>
					<span id="lne" style="display:none" onMouseOut="logclose()" onMouseOver="logmine()">
						<span style="background:#fff;">

							<a href="{{url('index/mycourse')}}" style="width:70px; display:block;" class="link2 he ico" target="_blank">{{session('user_name')}}</a>
						</span>
						<div class="clearh"></div>
						<ul class="logmine" >
							<li><a class="link1" href="{{url('index/mycourse')}}">我的课程</a></li>
							<li><a class="link1" href="{{url('index/wen')}}">我的问答</a></li>
							<li><a class="link1" href="/index/logout">退出</a></li>
						</ul>
					</span>
				@endif
        </span>
	</div>
</div>

<div class="content">
	<div class="fullwidthbanner-container">
		<div id="revolution-slider" style="max-height:500px !important; background:#46B0AC">
			<ul>
				<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="images-slider/thumbs/thumb1.jpg">
					<!--  BACKGROUND IMAGE -->
					<img src="images-slider/wide2.jpg" alt="" />

					<!-- THE CAPTIONS IN THIS SLIDE -->
					<div class="tp-caption sfl"
						 data-x="-130"
						 data-y="100"
						 data-speed="300"
						 data-start="300"
						 data-easing="easeOutBack">
						<img src="images-slider/rb.png" alt="">
					</div>

					<div class="caption sfb"
						 data-x="0"
						 data-y="130"
						 data-speed="300"
						 data-start="800"
						 data-easing="easeOutExpo">
						<h2>谋刻网全新上线</h2>
					</div>

					<div class="tp-caption med-white sfl"
						 data-x="0"
						 data-y="220"
						 data-speed="300"
						 data-start="1000"
						 data-easing="easeOutExpo" style="font-size:20px;">
						请自备小板凳，强势围观。
					</div>

					<div class="tp-caption small-white sfr"
						 data-x="0"
						 data-y="260"
						 data-speed="300"
						 data-start="1200"
						 data-easing="easeOutExpo">
						<a href="#" class="btn btn-large btn-primary">在线测评</a>
					</div>

					<div class="tp-caption small-white lfb"
						 data-x="300"
						 data-y="90"
						 data-speed="1000"
						 data-start="1400"
						 data-easing="easeOutExpo">
						<img src="images-slider/slider-10.png" alt="" />
					</div>
				</li>
				<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="images-slider/thumbs/thumb1.jpg">
					<!--  BACKGROUND IMAGE -->
					<img src="images-slider/wide3.jpg" alt="" />

					<!-- THE CAPTIONS IN THIS SLIDE -->
					<div class="tp-caption sfl"
						 data-x="-130"
						 data-y="150"
						 data-speed="300"
						 data-start="300"
						 data-easing="easeOutBack">
						<img src="images-slider/rb.png" alt="">
					</div>

					<div class="tp-caption med-white lfl"
						 data-x="0"
						 data-y="200"
						 data-speed="300"
						 data-start="800"
						 data-easing="easeOutExpo" style="font-size:18px; line-height:25px;">
						<p>我们一直致力于优秀的职业教育，<br/>为你搭建成就梦想的舞台。</p>
					</div>

					<div class="caption sfb very-big-white"
						 data-x="700"
						 data-y="230"
						 data-speed="300"
						 data-start="1200"
						 data-easing="easeOutExpo">
						<i>winner</i>
					</div>
					<div class="tp-caption med-white lfl"
						 data-x="0"
						 data-y="150"
						 data-speed="300"
						 data-start="800"
						 data-easing="easeOutExpo" style="font-size:22px; line-height:30px;">
						<h2 style="font-size:30px">职业教育在线测评与学习平台</h2>
					</div>

					<div class="tp-caption small-white lfr"
						 data-x="0"
						 data-y="280"
						 data-speed="300"
						 data-start="1600"
						 data-easing="easeOutExpo">
						<a href="#" class="btn btn-large btn-primary">在线学习</a>
					</div>


					<div class="tp-caption lfb"
						 data-x="390"
						 data-y="90"
						 data-speed="1000"
						 data-start="2000"
						 data-easing="easeOutExpo"
						 data-endeasing="fade" style="left:700px"
					>
						<img src="images-slider/guy-shadow.png" alt="">
					</div>

					<div class="tp-caption small-white lft"
						 data-x="240"
						 data-y="0"
						 data-speed="2000"
						 data-start="2600"
						 data-easing="easeOutExpo">
						<img src="images-slider/spotlight.png" alt="">
					</div>

					<div class="tp-caption fade"
						 data-x="390"
						 data-y="90"
						 data-speed="2000"
						 data-start="2600"
						 data-easing="easeOutExpo">
						<img src="images-slider/guy.png" alt="">
					</div>
				</li>

				<!-- THE FIRST SLIDE -->
				<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="images-slider/thumbs/thumb1.jpg">
					<!--  BACKGROUND IMAGE -->
					<img src="images-slider/wide1.jpg" alt="" />

					<!-- THE CAPTIONS IN THIS SLIDE -->
					<div class="caption large_text sfb"
						 data-x="300"
						 data-y="207"
						 data-speed="300"
						 data-start="800"
						 data-easing="easeOutExpo">
						<img src="images-slider/our-features.png" alt="">
					</div>

					<div class="tp-caption sfr"
						 data-x="220"
						 data-y="115"
						 data-speed="300"
						 data-start="1000"
						 data-easing="easeOutBack">
						<img src="images-slider/lu.png" alt="">
					</div>

					<div class="tp-caption sfr"
						 data-x="-50"
						 data-y="110"
						 data-speed="300"
						 data-start="1200"
						 data-easing="easeOutBack">
						<img src="images-slider/clean.png" alt="">
					</div>

					<div class="tp-caption sfr"
						 data-x="180"
						 data-y="217"
						 data-speed="300"
						 data-start="1400"
						 data-easing="easeOutBack">
						<img src="images-slider/lm.png" alt="">
					</div>

					<div class="tp-caption sfr"
						 data-x="-20"
						 data-y="230"
						 data-speed="300"
						 data-start="1600"
						 data-easing="easeOutBack">
						<img src="images-slider/responsive.png" alt="">
					</div>

					<div class="tp-caption sfr"
						 data-x="220"
						 data-y="285"
						 data-speed="300"
						 data-start="1800"
						 data-easing="easeOutBack">
						<img src="images-slider/lb.png" alt="">
					</div>

					<div class="tp-caption sfr"
						 data-x="40"
						 data-y="360"
						 data-speed="300"
						 data-start="2000"
						 data-easing="easeOutBack">
						<img src="images-slider/bootstrap.png" alt="">
					</div>

					<div class="tp-caption sfl"
						 data-x="625"
						 data-y="115"
						 data-speed="300"
						 data-start="2200"
						 data-easing="easeOutBack">
						<img src="images-slider/ru.png" alt="">
					</div>

					<div class="tp-caption sfl"
						 data-x="730"
						 data-y="85"
						 data-speed="300"
						 data-start="2400"
						 data-easing="easeOutBack">
						<img src="images-slider/solid.png" alt="">
					</div>

					<div class="tp-caption sfl"
						 data-x="650"
						 data-y="217"
						 data-speed="300"
						 data-start="2600"
						 data-easing="easeOutBack">
						<img src="images-slider/rm.png" alt="">
					</div>

					<div class="tp-caption sfl"
						 data-x="770"
						 data-y="217"
						 data-speed="300"
						 data-start="2800"
						 data-easing="easeOutBack">
						<img src="images-slider/lightweight.png" alt="">
					</div>

					<div class="tp-caption sfl"
						 data-x="625"
						 data-y="285"
						 data-speed="300"
						 data-start="3000"
						 data-easing="easeOutBack">
						<img src="images-slider/rb.png" alt="">
					</div>

					<div class="tp-caption sfl"
						 data-x="730"
						 data-y="345"
						 data-speed="300"
						 data-start="3200"
						 data-easing="easeOutBack">
						<img src="images-slider/fresh.png" alt="">
					</div>
				</li>



			</ul>
		</div>
	</div>

	<div class="td1">
		<div class="tdcont">
			<span class="tdimg"><img src="images/ico4.jpg" width="450"></span>
			<span class="tdtext">
        	<h3>完全免费课程</h3>
            <p>精心录制视频课程与讲解，全部课程完全免费。</p><br/>
            <p><a href="{{url('/index/courselist')}}" class="btninto">开始学习</a></p>
        </span>
			<div style="clear:both"></div>
		</div>
	</div>

	<div class="td2 np">
		<div class="tdcont np">
			<span class="tdimg1 ni"><img src="images/ico7.png" width="300"></span>
			<span class="tdtext1" style="margin-top:100px;">
        	<h3 class="co3">全天答疑解惑</h3>
            <p class="tex1">谋刻答疑社区，老师学员共同交流，我们的讲师更是倾囊相授，有问必答。</p><br/>
            <p><a href="{{url('/index/wen')}}" class="btninto">提问问题</a></p>
        </span>
			<div style="clear:both"></div>
		</div>
	</div>

	<div class="crdiv">

		<div class="course">
			<h2 style="text-align:center; font-weight:normal; font-size:34px">精品课程</h2>
			<div class="clearh" style="height:20px;"></div>

			<div>
				<ul id="myTab3" >
					@foreach($courseType as $k=>$v)
							<li class="norma3" courseId={{$v->course_type_id}}>{{$v->course_type_name}}</li>
					@endforeach
				</ul>
				<div class="clearh"></div>
				<div>
					<ul class="courseul" id="myTab3_Content0" style="display: block;">
						@foreach($course as $k=>$v)
							<a href="/index/courseDetail?course_id={{$v->course_id}}">
								<li>
									<div class="courselist">
										<img width="263" style="border-radius:3px 3px 0 0;" src="images/c1.jpg" >
										<p class="courTit">{{$v->course_name}}</p>
										<div class="gray">
											<span>1小时前更新</span>
											<span class="sp1">{{$v->start_people}}人学习</span>
											<div style="clear:both"></div>
										</div>
									</div>
								</li>
							</a>

						@endforeach
						<div class="clearh"></div>
					</ul>
				</div>
			</div>

			<div class="line no"></div>

		</div>


	</div>
	<div class="foot">
		<div class="fcontainer">
			<div class="fwxwb">
				<div class="fwxwb_1">
					<span>关注微信</span><img width="95" alt="" src="images/num.png">
				</div>
				<div>
					<span>关注微博</span><img width="95" alt="" src="images/wb.png">
				</div>
			</div>
			<div class="fmenu">
				<p><a href="#">关于我们</a> | <a href="#">联系我们</a> | <a href="#">优秀讲师</a> | <a href="#">帮助中心</a> | <a href="#">意见反馈</a> | <a href="#">加入我们</a></p>
			</div>
			<div class="copyright">
				<div><a href="/">谋刻网</a>所有&nbsp;晋ICP备12006957号-9</div>
			</div>
		</div>
	</div>
</div>

<!--右侧浮动-->
<div class="rmbar">
	<span class="barico qq" style="position:relative">
	<div  class="showqq">
	   <p>官方客服QQ:<br>335049335</p>
	</div>
	</span>
	<span class="barico em" style="position:relative">
	  <img src="images/num.png" width="75" class="showem">
	</span>
	<span class="barico wb" style="position:relative">
	  <img src="images/wb.png" width="75" class="showwb">
	</span>
	<span class="barico top" id="top">置顶</span>
</div>

</body>
</html>
<script>
	function logmine(){
		document.getElementById("lne").style.display="block";
	}
	function logclose(){
		document.getElementById("lne").style.display="none";
	}

	/*右侧客服飘窗*/
	$(".label_pa li").click(function() {
		$(this).siblings("li").find("span").css("background-color", "#fff").css("color", "#666");
		$(this).find("span").css("background", "#fb5e55").css("color", "#fff");
	});
	$(".em").hover(function() {
		$(".showem").toggle();
	});
	$(".qq").hover(function() {
		$(".showqq").toggle();
	});
	$(".wb").hover(function() {
		$(".showwb").toggle();
	});
	$("#top").click(function() {
		if (scroll == "off") return;
		$("html,body").animate({
					scrollTop: 0
				},
				600);
	});

	//精品课堂 分类  点击变色并显示规定课程
	var CourseType = $("#myTab3").children();
	CourseType.click(function(){
		$(this).siblings().attr('class','norma3');
		$(this).attr('class','current');

		//根据课程分类id 获取 课程
		var courseId = $(this).attr('courseId');
		// alert(courseId);return false
		var html = '';
		$.ajax({
			url:'/index/index/typeGetCourse',
			data:{course_id:courseId},
			type:'post',
			success:function(res){
				$.each(res,function(index,e){
					html += '<a href="/index/courseDetail?course_id='+ e.course_id+'">\n' +
							'<li>\n' +
							'\t\t\t\t\t<div class="courselist">\n' +
							'\t\t\t\t\t\t<img width="263" style="border-radius:3px 3px 0 0;" src="images/c1.jpg" >\n' +
							'\t\t\t\t\t\t<p class="courTit">'+ e.course_name +'</p>\n' +
							'\t\t\t\t\t\t<div class="gray">\n' +
							'\t\t\t\t\t\t\t<span>1小时前更新</span>\n' +
							'\t\t\t\t\t\t\t<span class="sp1">'+ e.start_people +'人学习</span>\n' +
							'\t\t\t\t\t\t\t<div style="clear:both"></div>\n' +
							'\t\t\t\t\t\t</div>\n' +
							'\t\t\t\t\t</div>\n' +
							'\t\t\t\t</li>\n' +
							'\t\t\t\t</a>';

				});
				$("#myTab3_Content0").html(html+"<div class=\"clearh\"></div>");
			}
		});
		return false;
	})

</script>
