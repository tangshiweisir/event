<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//欢迎页面
Route::get('/', function () {
    return view('welcome');
});
//admin
//管理员后台首页
Route::get('/admin/user/index','admin\UserAdminController@index');
//讲师列表、管理、锁定
route::any('/admin/user/teacherlist','admin\UserAdminController@teacherList');
//搜索+分页
route::any('/admin/user/searchpage','admin\UserAdminController@searchPage');
//审核讲师
route::any('/admin/user/auditteacher','admin\UserAdminController@auditTeacher');
//讲师添加
Route::any('/admin/teacher/create','admin\UserAdminController@teacherCreate');
//讲师登录
Route::any('/admin/teacher/login','admin\TecherAdminController@login');
Route::any('/admin/teacher/loginOut','admin\TecherAdminController@loginOut');
//讲师后台首页
Route::get('/admin/techer/index','admin\TecherAdminController@index');

//课程添加页面
Route::get('/admin/user/courseAdd','admin\CourseController@courseAdd');
//课程添加页面
Route::get('/admin/user/courseAddDo','admin\CourseController@courseAddDo');
//课程展示页面
Route::get('/admin/user/courseList','admin\CourseController@courseList');
//留言展示页面
Route::any('/admin/user/coursemessageList','admin\CourseController@coursemessageList');
//留言审核
Route::any('/admin/user/aduitMessage','admin\CourseController@aduitMessage');

//index
//前台课程列表展示
Route::get('/index/courselist','index\CourseController@courseList');
//课程分类下的课程列表
Route::get('/index/coursetypeshow','index\CourseController@coursetypeshow');
//进入课程详情
Route::get('/index/courseDetail','index\CourseController@courseDetail');

Route::any('/index/courselist','index\CourseController@courseList');
Route::any('/index/index/typeGetCourse','index\IndexController@typeGetCourse');
//课程加入学习
Route::get('/index/coursecont','index\CourseController@coursecont')->middleware('normaluser');

Route::any('/index/video','index\CourseController@video');
//添加留言
Route::any('/index/leaveMessage','index\CourseController@leaveMessage');
//留言展示
Route::any('/index/messageList','index\CourseController@messageList');


//个人中心
Route::any('/index/mycourse','index\CourseController@mycourse')->middleware('normaluser');
//修改用户信息
Route::any('/index/upduser/{user_id?}','index\CourseController@updUserMessage')->middleware('normaluser');
//执行修改
Route::any('/index/upduserdo','index\CourseController@updUserMessageDo')->middleware('normaluser');

//我的笔记
Route::any('/index/meword','index\CourseController@meword')->middleware('normaluser');
//添加笔记
Route::any('/index/writeword','index\CourseController@writeword')->middleware('normaluser');
//执行笔记的添加
Route::any('/index/worddo','index\CourseController@worddo')->middleware('normaluser');
//问答
Route::any('/index/wen','index\CourseController@myask')->middleware('normaluser');
//提问
Route::any('/index/getcontent','index\CourseController@getcontent')->middleware('normaluser');

//讲师列表
Route::any('/index/teacherlist','index\TeacherController@index');
//讲师详情
Route::any('/index/teacher','index\TeacherController@teacher');
//咨询列表
Route::any('/index/articlelist','index\ArticleController@index');
//咨询详情
Route::any('/index/article','index\ArticleController@article');
//资讯展示
Route::get('/admin/art/index','admin\ArtController@index');
//资讯添加
Route::get('/admin/art/add','admin\ArtController@add');
//资讯删除
Route::get('/admin/art/del','admin\ArtController@del');
//资讯后台添加执行
Route::post('/art/add_do','admin\ArtController@add_do');




//前台首页
Route::any('/index/index','index\IndexController@index');
//前台登录页面
Route::any('/index/login','index\LoginController@login');
//前台登录
Route::any('/index/loginDo','index\LoginController@loginDo');
//退出登录
Route::any('/index/logout','index\LoginController@logout');
//前台注册页面
Route::any('/index/register','index\RegisterController@register');
//前台注册
Route::post('/index/registerDo','index\RegisterController@registerDo');
//验证邮箱页面
Route::any('/index/emailcheck','index\PasswordController@emailcheck');
//验证邮箱发送验证码
Route::any('/index/emailcheckDo','index\PasswordController@emailcheckDo');
//验证验证码
Route::any('/index/codecheck','index\PasswordController@codecheck');
//修改密码页面
Route::any('/index/password','index\PasswordController@password');
//修改密码
Route::any('/index/passwordDo','index\PasswordController@passwordDo');
