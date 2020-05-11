<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;//可以直接引入，已经封装好
use Input;
use DB;

class PublicController extends Controller
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
	public function login(){
		//换图标的话，可以去官网核心处第三个下载3.7
		return view('admin.public.login');
	}
	public function check(Request $request){
		if(Input::method() == 'POST'){
			$this->validate($request,[
				'username'	=> 'required|min:2|max:20',
				'password'	=> 'required|min:6',
				//'captcha'	=> 'required|size:4|captcha',//size表示等于
			
			]);
			//使用layer插件让弹窗更好看一些，下面进行判断
			//使用auth门面来进行验证，也可以自行设计验证算法
			//语法：Auth:guard('')->attempt(需要验证的信息,bool值->是否保留此次登陆信息rememberme),返回值为bool类型,去app/auth.php自定义自己的验证信息,5.4是这样，5.1修改就好
			$data = $request->only(['username','password']);
			$data['status']='2';//同时验证用户是否为活跃状态
			
			$result=Auth::attempt($data,$request->get('online'));
			if($result){
				return redirect('Admin/index/index');
			}
			else{
				return redirect('/Admin/public/login')->withErrors([
					'login_error'	=> '用户名或密码错误',//随便定义下标
				]);
			}
		}	
	}
	public function logout(){
		Auth::logout();
		return redirect('/Admin/public/login');
	}
	public function register(Request $request){
		if(Input::method() == 'POST'){
			$this->validate($request,[
				'username' 	=> 'required|min:2|max:20',
				'password'	=> 'required|min:4|max:20',
				'email'		=> 'required|email',
				'gender'	=> 'required',
			]);
			//通过验证，收集数据，插入数据库
			$result=DB::table('manager')->insert([
				'username'		=> $request->get('username'),
				'password'		=> bcrypt($request->get('password')),
				'gender'		=> $request->get('gender'),
				'mobile'		=> '13836451255',
				'email'			=> $request->get('email'),
				'role_id'		=> '2',
				'created_at' 	=> date('Y-m-d H:i:s',time()),
				'status'		=> '2',
			]);
			if($result){
				$data['username'] = $request->get('username');
				$data['password'] = bcrypt($request->get('password'));
				//添加用户门面
				$res=Auth::attempt($data);
				return redirect('Admin/index/index');				
			}
			else{
				return redirect('Admin/public/register')->withErrors([
					'error'		=> '信息错误，请重新输入',
				]);
			}
		}
		else{
			return view('admin.public.register');
		}
		
	}
}
