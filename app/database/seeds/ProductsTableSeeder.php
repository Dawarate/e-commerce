<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$i = 0;
		foreach(range(1, 10) as $index)
		{
			$i++;
			Product::create([
				'name' => 'product'.$i,
				'description' => 'this is just a description'.$i,
				'price'    => '1234.56',
				'category_id' => rand(1,4),
				'image'  => '/img/products/1421873359-mac-book.jpg'
			]);
		}
	}

}