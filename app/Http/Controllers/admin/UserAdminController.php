<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
class UserAdminController extends Controller
{
    public function index()
    {
        return view('admin/userindex');
    }
    /**
     * @content 讲师列表、管理、锁定
     * access public
     * @author sunhuazhan
     * @params $request mixed
     * @return view
     */
    public function teacherList(Request $request)
    {
        #在职讲师 锁定
        if($request->isMethod('post') || $request->isMethod('ajax')){
            $t_id = $request->t_id ?? "";
            if($t_id){
                //锁定
                $res = Teacher::where(['t_id'=>$t_id])
                    ->update(['audit'=>4,'audit_reason'=>"已锁定"]);
                if($res){
                    return 1;//修改成功
                }else{
                    return 2;//修改失败
                }
            }else{
                die;
            }

        }else{
            $data = Teacher::whereIn('audit',[1,2])->get()->toArray();
            return view('admin/teacher/guanliteacher',['data'=>$data]);
        }
    }
    /**
     * @content 审核讲师
     * @author sunhuazhan
     * @return view
     */
    public function auditTeacher(Request $request)
    {
        if($request->isMethod('post') || $request->isMethod('ajax')){
            $t_id = $request->t_id ?? "";
            $type = $request->type ?? ""; //1为通过  2为不通过
            $audit_reason = $request->audit_reason ?? "";
            if($type == 1){
                // 通过
                // 根据t_id
                // 将数据库audit字段改为1 audit_reason 改为null
                $res = Teacher::where(['t_id'=>$t_id])
                    ->update(['audit'=>1,'audit_reason'=>null]);
            }else{
                // 不通过
                // 根据t_id
                // 将数据库audit字段改为3 audit_reason 失败原因入库
                $res = Teacher::where(['t_id'=>$t_id])
                    ->update(['audit'=>3,'audit_reason'=>$audit_reason]);
            }
            if($res){
                return 1;//修改成功
            }else{
                return 2;//修改失败
            }
        }else{
            $data = Teacher::where(['audit'=>2])->orderBy('t_id','desc')->get()->toArray();
            return view('admin/teacher/auditteacher',['data'=>$data]);
        }
    }



    //讲师添加
    public function teacherCreate(Request $request){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view('admin/teacher/teacherCreate');
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            $createData = $request->post();
            $createData['audit']=2;
            if(empty($createData)){
                return [
                    'code' => -1,
                    'msg' => '申请信息不能为空'
                ];
            }
            $info = Teacher::where(['t_name' => $request->t_name])->get()->toArray();
            if($info){
                return [
                    'code' => -1,
                    'msg' => '该账号已存在'
                ];
            }
            $res = Teacher::insert($createData);
            if($res){
                return [
                    'code' => 200,
                    'msg' => '正在申请，请耐心等待'
                ];
            }else{
                return [
                    'code' => -1,
                    'msg' => '申请失败，请稍后再试'
                ];
            }
        }
    }

}
