<?php

namespace App\Http\Controllers\admin;

use App\Models\UserIndexModel;
use App\Models\ReplyModel;
use App\Models\WenModel;
use App\Models\CourseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GLTeacherController extends Controller
{
    /**
     *
     *
     */
    public function reply(Request $request)
    {
        $t_id = session('t_id');
        dd($t_id);
    }


}
