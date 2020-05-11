<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    //
	protected $table='manager';
	protected $primaryKey='id';
	public $timestamps =true;
	public function role(){
		return $this->hasOne('App\Admin\Role','id','role_id');
	}
}
/**
	5.4版本里面需要用guard验证，所以这里应该写成如下格式
	首先在app/auth.php中改成根据规则改正
	然后在这里进行修改
	首先继承implements \Illuminate\Contracts\Auth\Authenticatable
	接着在class上面引入train:use Illuminate\Auth\Authenticatable
	最后在类中使用train use Authenticatable
	train可以被使用，不可以被继承
	

*/
