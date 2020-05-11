<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use App\Admin\Member;
use Session;


class TestController extends Controller
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
	//laravel\config\app.php下修改别名
	public function test1(){
		return "333";
	}
	public function test2(){
		echo Input::get("id",'10086');//输出用户get传来的参数，没有由后边的参数代替
		Input::all();//获得全部的值，以数组形式返回
		//获取指定的值
		Input::only(['id','name']);
		//获得除此之外的值
		Input::except(['id']);
		//了解某个值是否存在,返回boolean值
		Input::has('id');
		//Request、Input门面都可以使用获取用户信息
		
	}
	public function test3(){
		return "111";
	}
	public function add(){
		//insert、insertgetid
		 $db=DB::table("member");
		 $arr=array(
			array('name'=>'cwb','email'=>'cwb@qq.com'),
			array('name'=>'wf','email'=>'wf@qq.com'),
		 );
		 //echo $db->insert($arr);//返回插入的结果
		 echo $db->insertGetId(['name'=>'33','email'=>'33@qq.com']);//插入一条数据，从而得知最新id
	}
	public function save(){
		//update,increment,decrement
		$db=DB::table("member");
		echo $db->where('id','=','1')->update(['name'=>'cwbb']);//返回受影响的行数，如果运算符是‘=’的话，可以不写
		$db->increment('votes',5);//改变的字段类型为int型，如果不写5的话默认是1
	}
	public function select(){
		$db=DB::table("member");
		//查询所有数据，返回的是对象，不是数组
		$result=$db->get();
		//取出单行数据
		$result=$db->first();
		//获取某个特定的字段
		$result=$db->value('email');
		//多个字段同时起别名
		$result=$db->select(['name','id as uid'])->get();
		//排序操作
		$result=$db->orederBy("id","desc")->get();
		//分页操作
		$result=$db->limit(2)->offset(1)->get();//从1行开始查询2条数据
	}
	public function deleteOne(){
		$db=DB::table("member");
		//删除操作
		$db->where('id','=',4)->delete();
		//执行任意的sql语句
		DB::statement("insert,update,delete");
		DB::select("select");
	}
	public function test4(){
		$date=date('Y-m-d H:i:s',time());
		$day='日';
		$time=strtotime("+5 day");
		return view("test.test4",compact('date','day','time'));//compact->php内置函数
	}
	public function test5(){
		$db=DB::table("member");
		$data=$db->get();
		$day=date('N');
		return view('test.test5',compact('data','day'));
	}
	public function test6(){
		return view('test.test6');
	}
	public function test7(Request $request){
		$member = new Member();
		$member->create($request->all());//返回值是一个对象,在模型中fillname定义要接受什么数据
		//模型插入数据
	}
	public function test8(){
		//模型修改数据
		//首先获取数据，接着在找出要修改的字段，最后写回
		$me=new Member();
		$data=$me->find(4);
		$data->name = 'cccc';
		$result=$data->save();
		
		$result=Member::where('id','=','4')->update(['name' => 'cc']);
		dd($result);
	}
	public function test9(){
		//模型删除数据
		
		$data =Member::find(4);
		$data->delete();
		Member::where('id','=','4')->delete();
	}
	public function test10(){
		//模型查询数据
		//查询指定主键的记录
		$data = Member::find(4)->toArray();//如果想返回数组，可以这样写,laravel封装的方法
		//查询符合条件的第一条数据
		$data= Member::where('id','=','4')->first()->toArray();
		$member = new Member();
		$data=$member->where('id','=','4')->first()->toArray();
		
		//查询全部数据
		$member->all();//不允许连接其他
		$data=$member->select(['id','name'])->get();//查询指定字段,返回字符串类型
		
		$data=$member->get(['id','name']);//查询指定字段,返回数组类型
		dd($data);
		
	}
	public function test13(Request $request){
		//判断验证类型
		if(Input::method() == 'POST'){
			$this->validate($request,[
				'name'		=> 'required|min:2|max:20',//当是字符时，会变成长度，数字会是上下界
				'email'		=> 'required|email',
				'captcha'	=> 'required|captcha',
			]);
			return redirect('Admin/Test/test14');
		}
		else{
			return view('test.test13');
		}
		
	}
	public function test14(Request $request){
		if(Input::method() == 'POST'){
			//文件操作建议查看手册
			if($request-> hasfile('avatar') && $request->file('avatar')->isValid()){
				//做判断，是否上传了文件以及文件是否有效
				//获取文件原始名字
				//$request -> file('avatar') ->getClientOriginalName();
				//获取文件大小
				//$request -> file('avatar') -> getClientSize();
				//移动文件,对于路径而言，如果是php文件，用作为"./",html文件用作为"/"
				//核心代码，move()方法
				$path=uniqid().'.'.$request->file('avatar')->getClientOriginalExtension();
				$request->file('avatar')->move('./uploads/',$path);
				$data=$request->all();
				$data['avatar']='./uploads/'.$path;
				Member::create($data);
			}
		}
		else{
			return view('test/test14');
		}
		
	}
	public function test15(){
		//与get方法一样，做分页查询时用这个,与get一样可以用orderBy,where进行查询
		$data=Member::paginate(1);//每页展示多少数据
		/*
			$data->count();查看当前页的条数
			$data->currentPage();查看当前页码
			$data->firstItem();当前页第一条的序号
			$data->hasMorePages();是否有后续页码
			$data->lastItem();当前页最后一页的序号
			$data->lastPage();最后页序号
			{{$data->links()}} 5.3版本以后
		*/
		
		return view('test.test15',compact('data'));
	}
	public function test16(){
		return view('test.test16');
	}
	public function test17(){
		//用laravel方式来返回json数组
		$data=Member::all();
		return response()->json($data);
	}
	/*public function test18(){
		//对于session的一些处理
		Session::put('name','cwb');
		Session::get('name','default');//取出session数据，如果没有返回默认值
		Session::get('name',function(){return 'default'});//取出session数据，如果没有返回函数结果
		Session::flush();//清空所有session数据
		Session::forget('name');//删除指定数据
	}
	public function test19(){
		//缓存的数据存储于storage/framework/cache/data
		Cache::put('缓存名','缓存的数据',time);//以分钟为单位,如果有会覆盖
		Cache::add('缓存名','缓存的数据',time);//只能添加没有的缓存，如果有，不生效
		Cache::get('缓存名','default');//会得到结果，但并没有设置缓存
		Cache::get('缓存名',function(){return 'default';});//会得到结果，但不会设置缓存
		Cache::forever('缓存名','缓存值')//永久缓存
		Cache::forget('缓存名');//删除
		Cache::flush();//删除所有
		Cache::pull('缓存名');//返回结果后删除
		Cache::has('缓存名');//判断是否存在该缓存
		Cache::remember('缓存名',time,function(){return 'default';});//如果没有，设置缓存
		Cache::rememberForever('缓存名',function(){return 'default';};)//如果没有，永久缓存
		Cache::increment('缓存名',值);
		Cache::decrement('缓存名',值);
	}*/
	public function test20(){
		//联表查询
		$data=DB::table('acticle as t1')->select('t1.id','t1.acticle_name','t2.author_name')->leftJoin('author as t2','t1.author_id','=','t2.id')->get();
		dd($data);
	}
	public function test21(){
		//一对一建立关系模型
		$data=\App\Admin\Acticle::get();//首先获取数据
		foreach($data as $key=>$val){
			echo $val->acticle_name .'--'.$val->author->author_name.'<br>';//在此找到想要的数据
		}
	}
	public function test22(){
		//一对多建立关系模型
		$data=\App\Admin\Acticle::get();
		foreach($data as $k=>$v){
			echo $v->acticle_name.'--';
			foreach($v->comment as $val){
				echo $val->comment_name.'--';
			}
			echo '<br/>';
		}
	}
	public function test23(){
		//在多对一下建立模型
		$data=\App\Admin\Comment::get();
		foreach($data as $v){
			echo $v->comment_name . '-' . $v->acticle->acticle_name.'<br/>';
		}
	}
	public function test24(){
		//在多对多下建立模型
		$data=\App\Admin\Acticle::get();
		foreach($data as $v){
			echo $v->acticle_name . '--' ;
			foreach($v->keyword as $val){
				echo $val->keyword_name.'-';
			}
			echo '<br/>';
		}
	}
	
}
