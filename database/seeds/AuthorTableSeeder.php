<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
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
				'author_name'  => 'bb',
				
			),
			array(
				'author_name'  => 'cc',
				
			),
			array(
				'author_name'  => 'ww',
				
			),
		);
		DB::table('Author')->insert($arr);
    }
}
