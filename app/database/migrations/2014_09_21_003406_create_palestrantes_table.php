<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalestrantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('palestrantes', function(Blueprint $table)
		{
			$table->increments('id_palestrantes');
			$table->string('email', 150);
			$table->string('nome', 100);
			$table->text('sobre');
			$table->string('foto', 100);
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
		Schema::drop('palestrantes');
	}

}
