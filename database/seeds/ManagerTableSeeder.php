<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *	
     * @return void
     */
    public function run()
    {
		$faker=\Faker\Factory::create('zh_CN');//本地化，使得自己的生成的值符合规定,注意下划线
        //模拟数据用faker
		$arr=array();
		for($i=0;$i<100;$i++){
			$arr[]=array(
				'username'	=> $faker->userName,
				'password'	=> bcrypt('123456'),//laravel内置的加密方法
				'gender'	=> rand(1,3),
				'mobile'	=> $faker-> phoneNumber,
				'email'		=> $faker->email,
				'role_id'	=> rand(1,6),
				'created_at'=> date('Y-m-d H:i:s',time()),
				'status'	=> rand(1,2)
				
				
			);
		}
		DB::table('manager')->insert($arr);
		
    }
}
