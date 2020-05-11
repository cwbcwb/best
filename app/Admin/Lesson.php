<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
	protected $table='lesson';
	public function coursee(){
		return $this->hasOne('App\Admin\Coursee','id','course_id');
	}
}
