<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin\Manager;
use DB;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //展示首页
		$id=Auth::user()->id;
		$role_id=Auth::user()->role_id;
		$data = DB::table('manager')->where('manager.id',$id)->leftJoin('role','manager.role_id','=','role.id')->value('role.role_name');
		//取出该角色应有的权限
		$role_auth_list = DB::table('role')->where('id',$role_id)->value('auth_ids');
		//转成数组
		$role_auth_array = explode(',',$role_auth_list);
		//找出第一级权限
		$first_auth=DB::table('auth')->where('pid',0)->whereIn('id',$role_auth_array)->get();
		//找出除了第一级的权限
		$other_auth=DB::table('auth')->where('pid','>',0)->whereIn('id',$role_auth_array)->get();
		return view('admin.index.index',compact('data','first_auth','other_auth'));
		//动态获取用户信息
		//Auth::user()
    }
	public function welcome(){
		return view('admin.index.welcome');
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
