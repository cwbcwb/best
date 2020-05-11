<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Role;
use App\Admin\Auth;
use Input;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//显示角色信息
		$data=Role::get();
		return view('admin.role.index',compact('data'));
    }
	public function assign(){
		//为用户分配权限
		if(Input::method() == 'POST'){
			$data = Input::only(['id','auth_id']);//获得为用户增添的权限
			//它交给了Role类去处理
			$role = new Role();
			$result = $role->assignAuth($data);
			return $result;
		}
		else{
			//获得权限列表，以及该用户直接有哪些权限
			//首先获得顶级权限,其次获得其它权限开始匹配
			$auth_top_list=Auth::where('pid','0')->get();
			$auth_other_list = Auth::where('pid','>','0')->get();
			return view('admin.role.assign',compact('auth_top_list','auth_other_list'));
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
