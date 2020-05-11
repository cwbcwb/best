<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //定义模型关联的数据表(一个模型只操作一个表)
	protected $table='member';//表名
	protected $primaryKey = 'id';//表的主键
	/*
		调用模型来操作数据库有两种方法
		①Member::get() ==> DB::table('member')->get();
		②$me = new Member();$me->get();
	
	
	*/
	
	
}
