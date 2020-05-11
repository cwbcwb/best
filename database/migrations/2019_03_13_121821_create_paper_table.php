<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTable extends Migration
{
    /**
     * Run the migrations.
	 * paper:表名
     *
     * @return void
     */
    public function up()
    {
        //创建数据表 php artisan make:migration create_表名_table
		Schema::create('paper', function (Blueprint $table) {
			//设置字段=> 列类型方法->列修饰方法notNull,default,notNull,unique
			//increment设置主键
            $table->increments('id');
			//string=>varchar
            $table->string('paper_name','100')->notNull()->unique();//默认长度是100 tinyInteger->整形
            //$table->enum('status',[1,2]);
			$table->tinyInteger('total_score')->default(100);
			$table->Integer('start_time')->nullable();//允许为空
			$table->tinyInteger('duration');
			$table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除数据表
		//第一次用迁移时，需要执行命令php artisan migrate:install 从而创建迁移表
		//migration:已经执行过的迁移文件名
		//batch:批次号
		//执行命令php artisan migrate 开始创建表，并录入相关信息
		//执行命令php artisan migrate:rollback 回滚删除最新一批序号
		Schema::drop('paper');
    }
}
