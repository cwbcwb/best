<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	Schema::create('manager',function(Blueprint $table){
		$table-> increments('id');
		$table->string('username',200)->notNull();
		$table->string('password',255)->notNull();
		$table->enum('gender',['1','2','3'])->notNull()->default('1');
		$table->string('mobile',11)->nullable();
		$table->string('email',40)->nullable();
		$table->tinyInteger('role_id')->nullable();
		$table->timestamps();
		$table->string('remember_token',100)->nullable();
		$table->enum('status',['1','2'])->notNull()->default('2');	
		
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::dropIfExists('manager');
    }
}
