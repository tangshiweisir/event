<?php

namespace App\Http\Controllers\index;


use App\Models\LeavesWordModel;
use App\Models\ReplyModel;
use App\Models\UserIndexModel;
use App\Models\UserStudyModel;
use App\Models\WordModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /*
     * 课程展示
     * */
    public function courseList()
    {
        return view('index/courselist');
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
        #学习中(未学完)
        $userCourse = UserStudyModel::where(['u_id'=>$user_id,'status'=>2])->get()->toArray();
        if(!$userCourse){
            return [
                'code' => 1004,
                'message' => "该用户没有课程",
                'data'=>[]
            ];
        }
        #已学完
        $userCoursed = UserStudyModel::where(['u_id'=>$user_id,'status'=>1])->get()->toArray();
        if(!$userCoursed){
            return [
                'code' => 1004,
                'message' => "该用户没有课程",
                'data'=>[]
            ];
        }
        return view('index/mycourse',[
            'user_info'=>$user_info,
            'usercourse'=>$userCourse,
            'usercoursed'=>$userCourse
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
    //加入学习
    public function coursecont()
    {
        return view('index/coursecont');
    }
     //课程详情
    public function coursecont1()
     {
         return view('index/coursecont1');
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
        $arr=LeavesWordModel::join('user_index','user_index.user_id','=','leave_words.user_id')->where('status','=',1)->get()->toArray();
        $arr2=ReplyModel::join('teacher','reply.t_id','=','teacher.t_id')->get();

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
        $content=$request->content;
        $uid=$request->uid;
        $data=[
            'user_id'=>$uid,
            'l_contents'=>$content,
            'c_time'=>time(),
            'status'=>1,
        ];
        $res=LeavesWordModel::insert($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }

    }
}
