<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdquirientesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adquirientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 255);
			$table->string('rfc', 255);
			$table->string('curp', 255);
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
		Schema::drop('adquirientes');
	}

}
