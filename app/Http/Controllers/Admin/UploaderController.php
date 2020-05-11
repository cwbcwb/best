<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
	public function webuploader(Request $request){
		//实现文件上传
		//文件名为file
		if($request -> file('file')->isValid() && $request -> hasFile('file')){
			//如果文件成功上传
			$filename=uniqid().'.'.$request->file('file')->getClientOriginalExtension();
			//使用storage门面来上传文件
			//storage有三种类型的磁盘,本地磁盘，公共磁盘，第三方磁盘，第一种只能php代码访问，浏览器不可以访问，第二种是两边都可以访问，第三种是允许开发者将数据传到第三方服务器上,当浏览器不能访问但又想访问的时候，做一个软连接，连接语句:php artisan storage:link,正常来讲会在public目录里创建出一个目录storage里面存储上传的东西
			//文件保存/移动Storage->disk('public')->put('文件名','内容')
			/*Storage::disk('public')->put($filename,file_get_contents($request->file('file')->path()));*/
			//返回的数据
			$result=array(
				'errcode'	=> '0',
				'path'		=> $filename,
				'errMsg'	=> '上传成功',
			);
		}
		else{
			$result=array(
				'errcode'	=> '000001',
				'errMsg'	=> $request->file('file')->getErrorMessage(),
			);
		}
		return response()->json($result);
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
