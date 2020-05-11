<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Member;
use App\Admin\City;
use Input;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$data = Member::get();
		return view('admin.member.index',compact('data'));
    }
	public function add(){
		if(Input::method() == 'POST'){
			$result=Member::insert([
				'username'		=> Input::get('username'),
				'password'		=> bcrypt('password'),
				'gender'		=> Input::get('gender'),
				'mobile'		=> Input::get('mobile'),
				'email'			=> Input::get('email'),
				'avatar'		=> 'jj',
				'type'			=> Input::get('type'),
				'status'		=> Input::get('status'),
			]);
			return $result?1:0;
		}
		else{
			//查询第一层
			$data=City::where('pid',0)->get();
			return view('admin.member.add',compact('data'));
		}
		
	}
	public function getAreaById(){
		//实现ajax请求
		$id=Input::get('id');
		$data=City::where('pid',$id)->get();
		
		return response()->json($data);
		
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
