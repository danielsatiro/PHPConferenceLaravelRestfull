<?php

class PalestrasTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('palestras')->delete();

		Palestra::create(
			array(
				'id_palestras' => 1, 
				'id_palestrantes' => 1, 
				'id_macro_temas'=> 1, 
				'titulo' => 'Criando API Restful com Laravel Framework', 
				'resumo' => 'Mostrando na pratica como criar facilmente uma API com Laravel e verificar sua funcionalidade com o uso do Postman', 
				'descricao' => 'Instalação do Laravel, criação de migrations, criação de um CRUD de exemplo e rotas para o uso da API e como usar o Postman para testar a funcionamento (entrada/saida) da API.', 
				'topicos' => 'API Restful, Laravel Framework, Postman', 
				'pre_requisitos' => "Conceitos básicos sobre API's e Frameworks", 
				'referencias_assunto' => 'http://laravel.com/docs/quick', 
				'data' => '2014-12-06', 
				'hora_inicio' => '16:00:00', 
				'hora_fim' => '17:00:00'
			)
		);
	}

}
