<?php

class MacroTemasTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('macro_temas')->delete();

		MacroTema::create(array('id_macro_temas' => 1, 'macro_tema' => 'Frameworks & Ferramentas'));
		MacroTema::create(array('id_macro_temas' => 2, 'macro_tema' => 'APIs & Webservices'));
		MacroTema::create(array('id_macro_temas' => 3, 'macro_tema' => 'Desafios e Tendências'));
		MacroTema::create(array('id_macro_temas' => 4, 'macro_tema' => 'Estudos de Caso e Casos de Sucesso'));
		MacroTema::create(array('id_macro_temas' => 5, 'macro_tema' => 'Segurança'));
		MacroTema::create(array('id_macro_temas' => 6, 'macro_tema' => 'Mercado de Trabalho'));
	}

}
