<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Admin\Auth;
use DB;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//要在视图中显示的数据
		//原始sql语句：select t1.*,t2.auth_name from auth as t1 left join auth as t2 on t1.pid=t2.id;
		$data = DB::table('auth as t1')->leftJoin('auth as t2','t1.pid','=','t2.id')->select(['t1.*','t2.auth_name as parent_name'])->get();
		
        //显示展示的视图
		return view('admin.auth.index',compact('data'));
    }
	public function add(){
		//添加权限管理
		if(Input::method() == 'POST'){
			$data=Input::all();
			
			$result=Auth::insert($data);//返回类型为bool值
			return $result ? 1 : 0;
			
		}
		else{
			//需要在父级管理器中写出可选的父级选择器
			$data=Auth::where('pid','0')->get();
			return view('admin.auth.add',compact('data'));
		}
		
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
