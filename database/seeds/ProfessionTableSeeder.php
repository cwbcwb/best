<?php

use Illuminate\Database\Seeder;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('profession')->insert([
			'pro_name'		=> 'php基础班',
			'protype_id'	=> '1',
			'teacher_ids'	=> '2,4,5,6',
			'created_at'	=> date('Y-m-d H:i:s',time()),
			'duration'		=> 18,
			'cover_img'		=> 'jj',
			'price'			=> '100.00',
		]);
		DB::table('profession')->insert([
			'pro_name'		=> 'php就业班',
			'protype_id'	=> '1',
			'teacher_ids'	=> '8,9,10,13',
			'created_at'	=> date('Y-m-d H:i:s',time()),
			'duration'		=> 20,
			'cover_img'		=> 'jj',
			'price'			=> '90.00',
		]);
		DB::table('profession')->insert([
			'pro_name'		=> '前端基础班',
			'protype_id'	=> '3',
			'teacher_ids'	=> '17,18,21,24',
			'created_at'	=> date('Y-m-d H:i:s',time()),
			'duration'		=> 30,
			'cover_img'		=> 'jj',
			'price'			=> '20.00',
		]);
		DB::table('profession')->insert([
			'pro_name'		=> '运维基础班',
			'protype_id'	=> '4',
			'teacher_ids'	=> '29,30,32,33',
			'created_at'	=> date('Y-m-d H:i:s',time()),
			'duration'		=> 31,
			'cover_img'		=> 'jj',
			'price'			=> '200.00',
		]);
    }
}
