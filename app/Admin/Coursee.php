<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Coursee extends Model
{
    //
	protected $table='coursee';
	public function profession(){
		return $this->hasOne('App\Admin\Profession','id','profession_id');
	}
}
