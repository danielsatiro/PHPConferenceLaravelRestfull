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

		$this->call('MacroTemasTableSeeder');
		$this->call('PalestrantesTableSeeder');
		$this->call('PalestrasTableSeeder');
	}

}
