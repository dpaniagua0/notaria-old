<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documentos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('numero_documento', 255);
			$table->string('fecha_captura');
			$table->string('tipo_documento');
			$table->string('fecha_llegada');
			$table->string('costo');
			$table->string('tipo_servicio');
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
		Schema::drop('documentos');
	}

}
