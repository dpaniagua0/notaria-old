<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaranot extends Model
{
    
	public $table = "declaranots";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "numero_escritura",
		"domicilio_numero",
		"colonia",
		"municipio_localidad",
		"entidad_federativa",
		"codigo_postal",
		"concepto",
		"enajenacion",
		"valor_operacion",
		"iva_causado",
		"isr_causado",
		"exento",
		"fecha_elaboracion",
		"domicilio_numero_adq",
		"colonia_adq",
		"municipio_adq",
		"entidad_adq",
		"correo_adq",
		"codigo_postal_adq",
		"fecha_firma_adq",
		"complemento_adq",
		"declaranot_adq",
		"impuestos_adq",
		"facturas_adq",
		"isai_adq"
	];

	public static $rules = [
	    "numero_escritura" => "required",
		"domicilio_numero" => "required",
		"colonia" => "required",
		"municipio_localidad" => "required",
		"entidad_federativa" => "required",
		"codigo_postal" => "required",
		"concepto" => "required",
		"enajenacion" => "required",
		"valor_operacion" => "required",
		"iva_causado" => "required",
		"isr_causado" => "required",
		"exento" => "required",
		"fecha_elaboracion" => "required",
		"domicilio_numero_adq" => "required",
		"colonia_adq" => "required",
		"municipio_adq" => "required",
		"entidad_adq" => "required",
		"correo_adq" => "required,email",
		"codigo_postal_adq" => "required",
		"fecha_firma_adq" => "required",
		"complemento_adq" => "required",
		"declaranot_adq" => "required",
		"impuestos_adq" => "required",
		"facturas_adq" => "required"
	];

}
