<?php

class PalestrantesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('palestrantes')->delete();

		Palestrante::create(array('id_palestrantes' => 1, 'email' => 'danielsatiro2003@yahoo.com.br', 'nome'=> 'Daniel Satiro', 'sobre' => '', 'foto' => ''));
		Palestrante::create(array('id_palestrantes' => 2, 'email' => 'willianmano@gmail.com', 'nome'=> 'Willian Mano', 'sobre' => '', 'foto' => ''));
	}

}
