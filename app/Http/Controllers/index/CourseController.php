<?php

namespace App\Http\Controllers\index;

use App\Models\CourseModel;
use App\Models\WenModel;
use App\Models\LeavesWordModel;
use App\Models\ReplyModel;
use App\Models\UserIndexModel;
use App\Models\UserStudyModel;
use App\Models\WordModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /*
      * 课程展示
      * */
    public function courseList()
    {
        $data=DB::table('course_type')->where(['p_id'=>0])->get();
        foreach($data as $k=>$v){
            $data[$k]->arr=$res=DB::table('course_type')->where(['p_id'=>$v->course_type_id])->get();
        }
        $dataInfo=DB::table('course')->where(['status'=>1])->simplePaginate(6);

        return view('index/courselist',['data'=>$data,'dataInfo'=>$dataInfo]);
    }

    public function coursetypeshow(){
        $course_type_id=$_GET['course_type_id'];
        $dataInfo=DB::table('course')->where(['status'=>1,'course_type_id'=>$course_type_id])->simplePaginate(6);
//        echo 111;die;
//       var_dump($dataInfo);die;
        return  view('index/coursetypeshow',['dataInfo'=>$dataInfo]);
    }
    /**
     * 进入课程详情
     */
    public function courseDetail(){
        $course_id=$_GET['course_id'];
        $data=DB::table('course')->where(['course_id'=>$course_id,'status'=>1])->first();
//        var_dump($data);die;
        $t_id=$data->t_id;
        $dataInfo=DB::table('teacher')->where(['t_id'=>$t_id,'audit'=>1])->first();
//        var_dump($dataInfo);die;
        return view('index.coursedetail',['data'=>$data,'dataInfo'=>$dataInfo]);
    }
    /**
     * 课程加入学习
     */
    public function coursecont(Request $request){
        $course_id = $request->course_id;
        $arr=WenModel::where(['course_id'=>$course_id])
            ->join('user_index','user_index.user_id','=','wen.user_id')
            ->orderBy('wen.c_time','desc')
            ->get()
            ->toArray();
//        dd($arr);
        $arr1=LeavesWordModel::where(['course_id'=>$course_id])
            ->join('user_index','user_index.user_id','=','leave_words.u_id')
            ->where('leave_words.status','=',1)
            ->get()
            ->toArray();
//        dd($arr1);

        $course_wen = [];
        foreach ($arr as $k=>$v){
            if($v['course_id'] == $course_id){
                $course_wen[] = $v;
            }
        }
        #这个老师回答这个课程下用户的提问
        $teacherReply=ReplyModel::join('wen','wen.wen_id','=','reply.wen_id')
            ->join('teacher','teacher.t_id','=','reply.t_id')
            ->join('course','course.course_id','=','wen.course_id')
            ->get()
            ->toArray();
        $user_id = session('user_id');
        $data = UserIndexModel::where('user_id', $user_id)->first();

        return view('index/coursecont', ['teacherReply'=>$teacherReply,'arr'=>$course_wen,'data'=>$data,'course_id'=>$course_id,'arr1'=>$arr1]);
    }
    /**
     * 个人中心
     * */
    public function mycourse()
    {
        $user_id = session('user_id');
        if(empty($user_id)){
            echo "<script>alert('请先登录');location.href='/index/login'</script>";
        }
        //用户信息
        $user_info = UserIndexModel::where(['user_id'=>$user_id])->first()->toArray();
        //用户课程

        #学习中(未学完) 该用户id学习的课程中未学完的课程

        $userCourse = UserStudyModel::join('course','course.course_id','=','user_study.c_id')
            ->where(['u_id'=>$user_id,'user_study.status'=>2])
            ->get();
        if(!$userCourse){
            $userCourse = [];
        }
//        dd($userCourse);
        #已学完
        $userCoursed = UserStudyModel::join('course','course.course_id','=','user_study.c_id')
            ->where(['u_id'=>$user_id,'user_study.status'=>1])
            ->get();
        if(!$userCoursed){
            $userCoursed = [];
        }
//        dd($userCoursed);
        #收藏
        $userCollect = UserStudyModel::join('course','course.course_id','=','user_study.c_id')
            ->where(['u_id'=>$user_id,'user_study.collect'=>1])
            ->get();
        if(!$userCollect){
            $userCollect = [];
        }
//        dd($userCollect);
        return view('index/mycourse',[
            'user_info'=>$user_info,
            'usercourse'=>$userCourse,
            'usercoursed'=>$userCoursed,
            'usercollect'=>$userCollect
        ]);
    }

    /**
     * @content 用户修改信息
     *
     * */
    public function updUserMessage(Request $request)
    {
        $user_id =  $request->user_id;
        $user_info = UserIndexModel::where(['user_id'=>$user_id])->first()->toArray();

        return view("index/upduser",['user_info'=>$user_info]);
    }
    /**
     * @content 执行用户修改信息
     *
     * */
    public function updUserMessageDo(Request $request)
    {
        $user_id = $request->user_id;
        $data = $request->all();
        unset($data['user_id']);
        $res = UserIndexModel::where(['user_id'=>$user_id])->update($data);
        if($res){
            echo "<script>alert('修改成功');location.href='/index/mycourse'</script>";
        }else{
            echo "<script>alert('未修改');location.href='/index/mycourse'</script>";
        }

    }
     //课程详情
    public function coursecont1()
     {
         return view('index/coursecont1');
     }


    //添加留言
    public function leaveMessage(Request $request)
    {
        $user_id = session('user_id');
        $text = $_POST['text'];
        if (empty($user_id)){
            $request=[
                'code'=>1,
                'font'=>'请先登录'
            ];
            return  $request;
        }else{
            $res= DB::table('leave_words')->insert(['l_contents'=>$text,'u_id'=>$user_id,'course_id'=>1,'c_time'=>time()]);
            if($res){
                $request=[
                    'code'=>2,
                    'font'=>'留言成功，待审核'
                ];
                return   $request;
            }
        }
    }

    //留言展示
    public function messageList()
    {
        $arr1=LeavesWordModel::join('user_index','user_index.user_id','=','leave_words.u_id')
            ->join('course','course.course_id','=','leave_words.course_id')
            ->where('leave_words.status','=',1)
            ->get()
            ->toArray();
        dd($arr1);
        return view('/index/coursecont',['arr1'=>$arr1]);
    }


    //开始学习
     public function video()
     {
         return view('index/video');
     }
    /**
     *我的笔记
     */
    public function meword(){
        $ress=WordModel::get();
        $user_id = session('user_id');
        $data = UserIndexModel::where('user_id', $user_id)->first();
        return view('index.meword',['data'=>$data,'res'=>$ress]);


    }
    /**
     * 添加笔记
     * */
    public function writeword(){

        return view('index/writeword');
    }
    /**
     *@content 添加笔记执行
     */
    public function worddo(Request $request){
        $name=$request->name;
        $word=$request->word;
        $data=[
            'w_title'=>$name,
            'w_content'=>$word,
            'c_time'=>time()
        ];
        $res=WordModel::insert($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
     * @content 展示我的问答
     *
     */
    public function myask(){
        #用户表 问题表 课程表
        $arr=WenModel::join('user_index','user_index.user_id','=','wen.user_id')
            ->join('course','course.course_id','=','wen.course_id')
//            ->where('wen.status','=',1)
            ->get()
            ->toArray();

//        dd($arr);
        #问题表 教室表 课程表 回答表

//        dd($arr);
        #问题表 讲师表 课程表 回答表
        $arr2=ReplyModel::join('wen','wen.wen_id','=','reply.wen_id')
            ->join('teacher','teacher.t_id','=','reply.t_id')
            ->join('course','course.course_id','=','wen.course_id')
            ->get()
            ->toArray();
//        dd($arr2);
        $user_id = session('user_id');
        if(empty($user_id)){
            echo "<script>alert('请先登录');location.href='/index/index';</script>";
        }
        $data = UserIndexModel::where('user_id', $user_id)->first();
        return view('index/wen', ['arr'=>$arr,'arr2'=>$arr2,'data'=>$data]);
    }
    /**
     * @content 用户对讲师提出问题
     * */
    public function getcontent(Request $request){
        $content=$request->content ?? "";
        $uid=$request->user_id ?? "";
        $course_id = $request->course_id ?? "";
        $data=[
            'user_id'=>$uid,
            'wen_content'=>$content,
            'c_time'=>time(),
            'status'=>1,
            'course_id'=>$course_id
        ];
        $res=WenModel::insert($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
}
