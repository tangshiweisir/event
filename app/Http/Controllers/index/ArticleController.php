<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    //咨询列表
    public function index()
    {
        $data=\DB::table('advisory')->paginate(5);
        $left=\DB::table('advisory')->limit(4)->get();
        return view('index/articlelist',compact('data','left'));
    }

    //咨询详情
    public function article()
    {
        return view('index/article');
    }
     

}
