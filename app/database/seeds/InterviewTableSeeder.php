<?php

/**
* 
*/
class InterviewTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('interviews')->delete();

		// User::create(array(
		// 	'username' => 'admin',
		// 	'password' => Hash::make('route66')
		// ));

		$faker = Faker\Factory::create();

		$nim = DB::table('cavis')->whereNotIn('nim', array('1701303535', '1801427841', '1701316393'))->lists('nim');
		for ($i=0; $i < 80; $i++) { 
			Interview::create(array(
			  	'cavis_nim' => $faker->randomElement($array = $nim),
			    'jam_interview' => 'Shift 1 : 08.00 - 10.30'
			));
		}
	}
}