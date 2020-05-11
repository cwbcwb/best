<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    //
	protected $table='auth';//表名
	protected $primaryKey = 'id';//表的主键
	public $timestamps =false;//不重要
}
