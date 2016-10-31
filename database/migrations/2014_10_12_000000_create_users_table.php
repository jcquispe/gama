<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 500);
			$table->string('paterno', 500);
			$table->string('materno', 500);
			$table->integer('ci');
			$table->string('exp',2);
			$table->string('us', 100);
			$table->string('password', 60);
			$table->string('tipo', 10);
			$table->boolean('vigente');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
