<?php

use Illuminate\Database\Seeder;

class AkTableSeeder extends Seeder
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
				'acticle_id'  	=> 2,
				'keyword_id'	=> 1,
			),
			array(
				'acticle_id'  	=> 2,
				'keyword_id'	=> 2,
			),
			array(
				'acticle_id'  	=> 3,
				'keyword_id'	=> 1,
			),
			
		);
		DB::table('Ak')->insert($arr);
    }
}
