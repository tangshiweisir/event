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

//管理员后台首页
Route::get('/admin/user/index','admin\UserAdminController@index');
//讲师后台首页
Route::get('/admin/techer/index','admin\TecherAdminController@index');





//前台首页
Route::any('/index/index','index\IndexController@index');
//前台登录
Route::any('/index/login','index\LoginController@index');
//前台注册
Route::any('/index/register','index\RegisterController@index');

//课程列表
Route::any('/index/courselist','index\CourseController@courseList');
//课程加入学习
Route::any('/index/coursecont','index\CourseController@coursecont');
//课程详情
Route::any('/index/coursecont1','index\CourseController@coursecont1');
//加入学习
Route::any('/index/video','index\CourseController@video');


//个人中心
Route::any('/index/mycourse','index\CourseController@mycourse');

//讲师列表
Route::any('/index/teacherlist','index\TeacherController@index');
//讲师详情
Route::any('/index/teacher','index\TeacherController@teacher');

//咨询列表
Route::any('/index/articlelist','index\ArticleController@index');
//咨询详情
Route::any('/index/article','index\ArticleController@article');