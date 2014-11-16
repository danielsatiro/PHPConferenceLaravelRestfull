<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalestrasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('palestras', function(Blueprint $table)
		{
			$table->increments('id_palestras');
			$table->integer('id_palestrantes');
			$table->integer('id_macro_temas');
			$table->string('titulo', 150);
			$table->string('resumo', 255);
			$table->text('descricao');
			$table->string('topicos');
			$table->string('pre_requisitos', 255);
			$table->string('referencias_assunto');
			$table->date('data');
			$table->time('hora_inicio');
			$table->time('hora_fim');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('palestras');
	}

}
