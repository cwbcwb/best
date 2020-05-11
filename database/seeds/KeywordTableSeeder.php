<?php

use Illuminate\Database\Seeder;

class KeywordTableSeeder extends Seeder
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
				
				'keyword_name'	=> '66',
			),
			array(
				'keyword_name'	=> 'ww',
				
			),
			array(
				'keyword_name'	=> 'ff',
				
			),
		);
		DB::table('keyword')->insert($arr);
    }
}
