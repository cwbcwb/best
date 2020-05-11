<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
	protected $table='city';//表名
	protected $primaryKey = 'id';//表的主键
	public $timestamps =false;
}
