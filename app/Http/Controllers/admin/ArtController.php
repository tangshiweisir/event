<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtController extends Controller
{
    public function add()
    {
        return  view('admin/art/add');
    }

    public function add_do()
    {
        $data=$_POST;
//        dd($data);
        unset($data['_token']);
//        dd($data);
        $data['c_time']=time();
        $data=\DB::table('advisory')->insert($data);
        echo "<script>alert('ok');location.href='/admin/art/index'</script>";
    }

    public function index()
    {
        $data=\DB::table('advisory')->paginate(5);
//        $data=json_encode($data);
//        $data=json_decode($data,true);
//        dd($data);

        return view('admin/art/index',compact('data'));
    }

    public function del()
    {
        $a_id=$_GET['a_id'];
        $res=\DB::table('advisory')->where(['a_id'=>$a_id])->delete();
        if($res){
            echo "<script>alert('ok');location.href='/admin/art/index'</script>";
        }
    }
}
