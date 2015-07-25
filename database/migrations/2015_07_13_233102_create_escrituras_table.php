<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscriturasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('escrituras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('numero_escritura');
			$table->string('fecha_entrega');
			$table->string('fecha_alta');
			$table->string('titular');
			$table->string('estado');
			$table->int('costo');
			$table->string('servicio');
			$table->string('path', 255);
			$table->string('file_extension', 255);
			$table->int('user_id');
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
		Schema::drop('escrituras');
	}

}
