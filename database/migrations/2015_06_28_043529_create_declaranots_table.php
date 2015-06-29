<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeclaranotsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('declaranots', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('numero_escritura', 255);
			$table->string('domicilio_numero', 255);
			$table->string('colonia', 255);
			$table->string('municipio_localidad', 255);
			$table->string('entidad_federativa', 255);
			$table->int('codigo_postal');
			$table->string('concepto', 255);
			$table->text('enajenacion');
			$table->string('valor_operacion', 255);
			$table->string('iva_causado', 60);
			$table->string('isr_causado', 60);
			$table->string('exento', 60);
			$table->string('fecha_elaboracion', 60);
			$table->string('domicilio_numero_adq', 60);
			$table->string('colonia_adq', 60);
			$table->string('municipio_adq', 60);
			$table->string('entidad_adq', 60);
			$table->string('correo_adq', 60);
			$table->string('codigo_postal_adq', 60);
			$table->string('fecha_firma_adq', 60);
			$table->string('complemento_adq', 60);
			$table->string('declaranot_adq', 60);
			$table->string('impuestos_adq', 60);
			$table->string('facturas_adq', 60);
			$table->string('isai_adq');
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
		Schema::drop('declaranots');
	}

}
