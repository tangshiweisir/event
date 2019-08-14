<?php

namespace App\Http\Controllers\index;


use App\Models\UserIndexModel;
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
        $dataInfo=DB::table('course')->where(['status'=>1,'is_pass'=>1])->simplePaginate(6);

        return view('index/courselist',['data'=>$data,'dataInfo'=>$dataInfo]);
    }

    public function coursetypeshow(){
        $course_type_id=$_GET['course_type_id'];
        $dataInfo=DB::table('course')->where(['status'=>1,'is_pass'=>1,'course_type_id'=>$course_type_id])->simplePaginate(6);
//        echo 111;die;
//       var_dump($dataInfo);die;
        return  view('index/coursetypeshow',['dataInfo'=>$dataInfo]);
    }
    /*
     * 进入课程详情
     */
    public function courseDetail(){
        return view('index.coursedetail');
    }


    /**
     * 个人中心
     * */
    public function mycourse()
    {
        $user_id = session('user_id');
        $user_info = UserIndexModel::where(['user_id'=>$user_id])->first()->toArray();
        return view('index/mycourse',['user_info'=>$user_info]);
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

<<<<<<< HEAD
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
            $res= DB::table('leave_words')->insert(['l_contents'=>$text,'u_id'=>$user_id,'period_id'=>1]);
            if($res){
                $request=[
                    'code'=>2,
                    'font'=>'留言成功，待审核'
                ];
                return   $request;
            }
        }
    }

=======
>>>>>>> zcy

    //开始学习
     public function video()
     {
         return view('index/video');
     }
}
