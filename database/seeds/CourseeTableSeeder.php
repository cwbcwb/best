<?php

use Illuminate\Database\Seeder;

class CourseeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('coursee')->insert([
			'course_name'		=> 'linux',
			'profession_id'		=> '2',
			'cover_img'			=> 'jj',
			'created_at'		=>date('Y-m-d H:i:s',time()),
		]);
		DB::table('coursee')->insert([
			'course_name'		=> 'window',
			'profession_id'		=> '1',
			'cover_img'			=> 'jj',
			'created_at'		=>date('Y-m-d H:i:s',time()),
		]);
		DB::table('coursee')->insert([
			'course_name'		=> 'php',
			'profession_id'		=> '2',
			'cover_img'			=> 'jj',
			'created_at'		=>date('Y-m-d H:i:s',time()),
		]);
		DB::table('coursee')->insert([
			'course_name'		=> 'java',
			'profession_id'		=> '1',
			'cover_img'			=> 'jj',
			'created_at'		=>date('Y-m-d H:i:s',time()),
		]);
    }
}
