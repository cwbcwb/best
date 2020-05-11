<?php

use Illuminate\Database\Seeder;

class lessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('lesson')->insert([
			'lesson_name'	=> 'linux发展史',
			'course_id'		=> '1',
			'video_addr'	=> './demo.mp4',
			'created_at'	=> date('Y-m-d H:i:s',time()),
			'video_time'	=> 86400,
		]);
		DB::table('lesson')->insert([
			'lesson_name'	=> 'window发展史',
			'course_id'		=> '2',
			'video_addr'	=> './demo.mp4',
			'created_at'	=> date('Y-m-d H:i:s',time()),
			'video_time'	=> 86400,
		]);
		DB::table('lesson')->insert([
			'lesson_name'	=> 'php发展史',
			'course_id'		=> '3',
			'video_addr'	=> './demo.mp4',
			'created_at'	=> date('Y-m-d H:i:s',time()),
			'video_time'	=> 86400,
		]);
		DB::table('lesson')->insert([
			'lesson_name'	=> 'php近代史',
			'course_id'		=> '1',
			'video_addr'	=> './demo.mp4',
			'created_at'	=> date('Y-m-d H:i:s',time()),
			'video_time'	=> 86400,
		]);
    }
}
