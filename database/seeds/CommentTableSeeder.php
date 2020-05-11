<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$arr=array(
			array(
				'comment_name'	=> '666',
				'acticle_id'	=> '1',
			),
			array(
				'comment_name'	=> '777',
				'acticle_id'	=> '2',
			),
			array(
				'comment_name'	=> '888',
				'acticle_id'	=> '1',
			),
		);
		DB::table('comment')->insert($arr);
    }
}
