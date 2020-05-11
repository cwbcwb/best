<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get("Admin/Test/test1","Admin\TestController@test1");//需这样填写
Route::get("Home/index/index","Home\IndexController@index1");
Route::group(['prefix'=>'Admin'],function(){
	Route::get("Test/test2",'Admin\TestController@test2');
	Route::get("Test/test3",'Admin\TestController@test3');
});
Route::group(['prefix'=>'Admin/Test'],function(){
	Route::get('add','Admin\TestController@add');
	Route::get('update','Admin\TestController@save');
	Route::get('delete','Admin\TestController@deleteOne');
	Route::get('select','Admin\TestController@select');
	Route::get('test4','Admin\TestController@test4');
	Route::get('test5','Admin\TestController@test5');
	Route::get('test6','Admin\TestController@test6');
	Route::get('test7','Admin\TestController@test7');
	Route::get('test8','Admin\TestController@test8');
	Route::get('test9','Admin\TestController@test9');
	Route::get('test10','Admin\TestController@test10');
	Route::any('test13','Admin\TestController@test13');
	Route::any('test14','Admin\TestController@test14');
	Route::any('test15','Admin\TestController@test15');
	Route::any('test16','Admin\TestController@test16');
	Route::any('test17','Admin\TestController@test17');
	Route::any('test18','Admin\TestController@test18');
	Route::any('test19','Admin\TestController@test19');
	Route::any('test20','Admin\TestController@test20');
	Route::any('test21','Admin\TestController@test21');
	Route::any('test22','Admin\TestController@test22');
	Route::any('test23','Admin\TestController@test23');
	Route::any('test24','Admin\TestController@test24');
});
//app\Http\Middleware\Authenticate.php下修改没有登录重定向到的位置
Route::group(['prefix' => 'Admin'],function(){
	Route::any('public/register','Admin\PublicController@register');
	Route::get('public/login','Admin\PublicController@login');
	Route::any('public/check','Admin\PublicController@check');
});
Route::group(['prefix' => 'Admin','middleware'=>'auth'],function(){
	Route::get('index/index','Admin\IndexController@index');
	Route::get('index/welcome','Admin\IndexController@welcome');
	Route::get('public/logout','Admin\PublicController@logout');
	Route::get('manager/index','Admin\ManagerController@index');
	//权限管理的路由
	Route::get('auth/index','Admin\AuthController@index');
	Route::any('auth/add','Admin\AuthController@add');
	//角色管理的路由
	Route::get('role/index','Admin\RoleController@index');
	//权限分配
	Route::any('role/assign','Admin\RoleController@assign');
	//会员路径的创建
	Route::get('member/index','Admin\MemberController@index');
	Route::any('member/add','Admin\MemberController@add');
	//异步上传图片
	Route::any('uploader/webuploader','Admin\UploaderController@webuploader');
	//ajax请求实现联动
	Route::get('member/getareabyid','Admin\MemberController@getAreaById');
	//专业分类的列表
	Route::get('protype/index','Admin\ProtypeController@index');
	//专业列表
	Route::get('profession/index','Admin\ProfessionController@index');
	//课程与点播课程的管理
	Route::get('course/index','Admin\CourseeController@index');
	Route::get('lesson/index','Admin\LessonController@index');
	//课程播放
	Route::get('lesson/play','Admin\LessonController@play');
	//execl文件的导入导出
	//Route::any('execl/import','Admin\ExeclController@import');
	//Route::any('execl/export','Admin\ExeclController@export');
	
});