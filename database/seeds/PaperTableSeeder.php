<?php

use Illuminate\Database\Seeder;

class PaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 填充器
     * @return void
     */
    public function run()
    {
        //执行命令，自动创建文件
		//php artisan make:seeder PeperTableSeeder
		$arr=array(
			array(
				'paper_name' 	=> 'aa',
				'start_time'	=> strtotime("+1 day"),
				'duration'		=> '120',
			),
			array(
				'paper_name' 	=> 'bb',
				'start_time'	=> strtotime("+1 day"),
				'duration'		=> '120',
			),
		);
		DB::table('paper')->insert($arr);
		//执行添加数据的命令
		//php artisan db:seed --class=PaperTableSeeder
		//没有回滚指令，删除数据的话就去表里进行删除即可
    }
}
