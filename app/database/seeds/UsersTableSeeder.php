<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		
			User::create([
				'name'     => 'anass RAKIBI',
				'email'    => 'anass.rakibi@gmail.com',
				'password' => Hash::make('041950898'),
			]);
		
	}

}