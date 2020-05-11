<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('protype',function(Blueprint $table){
			$table->increments('id');
			$table->string('protype_name',20)->nullable();
			$table->tinyInteger('sort')->nullable()->default(0);
			$table->timestamps();
			$table->enum('status',[1,2])->notNull()->default(1);
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
		Schema::dropIfExists('protype');
    }
}
