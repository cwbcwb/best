<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Acticle extends Model
{
    //定义模型关联的数据表(一个模型只操作一个表)
	protected $table='acticle';//表名
	protected $primaryKey = 'id';//表的主键
	public $timestamps =false;//不重要
	/*
		调用模型来操作数据库有两种方法
		①Member::get() ==> DB::table('member')->get();
		②$me = new Member();$me->get();
	*/
	public function author(){
		//每个文章下的作者
		return $this->hasOne('App\Admin\Author','id','author_id');
		//写下另一张从表的全部路径，接着是从表相关字段，接着是主表相关字段
	}
	public function comment(){
		//每个文章下的评论
		return $this->hasMany('App\Admin\Comment','acticle_id','id');
	}
	public function keyword(){
		//每个文章的关键词
		return $this->belongsToMany('App\Admin\Keyword','ak','acticle_id','keyword_id');
		//第一个是要连表的表位置，第二个是多对多的第三个表，第三个表中相关联的字段，第一个有关于本表，第二个是关联表
	}
	
	
}
