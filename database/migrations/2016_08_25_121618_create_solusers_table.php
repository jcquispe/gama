<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolusersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solusers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('ci');
			$table->string('dependencia');
			$table->string('correo');
			$table->boolean('procesado');
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
		Schema::drop('solusers');
	}

}
