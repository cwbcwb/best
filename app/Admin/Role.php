<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model
{
    //
	protected $table='role';//表名
	protected $primaryKey = 'id';//表的主键
	public $timestamps =false;//不重要
	public function assignAuth($data){
		$auth_ids=implode(',',$data['auth_id']);
		//执行语句获得auth_ac
		$ac_arr=DB::table('auth')->where('pid','!=',0)->whereIn('id',$data['auth_id'])->get();
		$auth_ac='';
		foreach($ac_arr as $v){
			$auth_ac.=$v->controller .'@'.$v->action.',';
		}
		$post['auth_ac']=strtolower(rtrim($auth_ac,','));
		$post['auth_ids']=$auth_ids;
		return DB::table('role')->where('id',$data['id'])->update($post);
		
		
		
	}
}
