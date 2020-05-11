<?php

use Illuminate\Database\Seeder;

class ProtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('protype')->insert([
			'protype_name'	=> '后端',
			'created_at'	=> time(),
			'status'		=> '1',
		]);
		DB::table('protype')->insert([
			'protype_name'	=> '前端',
			'created_at'	=> time(),
			'status'		=> '1',
		]);
		DB::table('protype')->insert([
			'protype_name'	=> '运维',
			'created_at'	=> time(),
			'status'		=> '1',
		]);
		DB::table('protype')->insert([
			'protype_name'	=> '网络营销',
			'created_at'	=> time(),
			'status'		=> '1',
		]);
    }
}
