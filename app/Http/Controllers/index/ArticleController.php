<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    //咨询列表
    public function index()
    {
        return view('index/articlelist');
    }

    //咨询详情
    public function article()
    {
        return view('index/article');
    }
     

}
