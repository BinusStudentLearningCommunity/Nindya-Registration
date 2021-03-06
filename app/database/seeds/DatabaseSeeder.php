<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('CavisTableSeeder');
		$this->command->info('Cavis table seeded!');

		$this->call('InterviewTableSeeder');
		$this->command->info('Interview table seeded!');

	}

}
