<?php

use Illuminate\Database\Seeder;

class ActicleTableSeeder extends Seeder
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
				'acticle_name'  => '容斋六笔',
				'author_id'		=> 1,
			),
			array(
				'acticle_name'  => '容斋五笔',
				'author_id'		=> 2,
			),
			array(
				'acticle_name'  => '容斋七笔',
				'author_id'		=> 1,
			),
		);
		DB::table('Acticle')->insert($arr);
    }
}
