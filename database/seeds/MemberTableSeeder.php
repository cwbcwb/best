<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$faker = \Faker\factory::create('zh_CN');
		$data=array();
		for($i=0;$i<30;$i++){
			$data[]=array(
				'username' 		=> $faker->username,
				'password'		=> bcrypt('password'),
				'gender'		=> rand(1,3),
				'mobile'		=> $faker->phoneNumber,
				'email'			=> $faker->email,
				'avatar'		=> 'jj',
				'created_at'		=> date('Y-m-d H-i-s',time()),
				'type'			=> rand(1,2),
				'status'		=> rand(1,2),
			);
		}
		DB::table('member')->insert($data);
		
    }
}
