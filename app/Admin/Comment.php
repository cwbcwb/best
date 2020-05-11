<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $table='comment';//表名
	protected $primaryKey = 'id';//表的主键
	public $timestamps =false;//不重要
	public function acticle(){
		return $this->hasOne('App\Admin\Acticle','id','acticle_id');
	}
	
}
