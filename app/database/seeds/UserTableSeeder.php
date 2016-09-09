<?php

/**
* 
*/
class UserTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'username' => 'admin',
			'password' => Hash::make('route66')
		));

		$faker = Faker\Factory::create();

		// for ($i=0; $i < 100; $i++) { 
		// 	User::create(array(
		// 	  	'username' => $faker->userName,
		// 	    'password' => $faker->word
		// 	));
		// }
	}
}