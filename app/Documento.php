<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    
	public $table = "documentos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "numero_documento",
		"fecha_captura",
		"tipo_documento",
		"fecha_llegada",
		"costo",
		"tipo_servicio",
		"user_id"
	];

	public static $rules = [
	    "numero_documento" => "required",
		"fecha_captura" => "required",
		"tipo_documento" => "required",
		"fecha_llegada" => "required",
		"costo" => "required",
		"tipo_servicio" => "required",
		"user_id" => "required"
	];

	public function scopeNumber($query, $number) {

		if($number != ""){
			$query->where('numero_documento', 'LIKE', '%'.$number.'%');
		}
	}

}
