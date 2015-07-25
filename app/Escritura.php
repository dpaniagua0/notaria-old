<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Escritura extends Model
{
    
	public $table = "escrituras";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "numero_escritura",
		"fecha_entrega",
		"fecha_alta",
		"titular",
		"estado",
		"costo",
		"servicio",
		"user_id"
	];

	public static $rules = [
	    "numero_escritura" => "required",
		"fecha_entrega" => "required",
		"fecha_alta" => "required",
		"titular" => "required",
		"estado" => "required",
		"costo" => "required",
		"servicio" => "required",
		"user_id" => "required"
	];

	public function scopeFilterTitle($query, $number) {

		if($number != ""){
			$query->where('numero_escritura', 'LIKE', '%'.$number.'%');
		}
	}

}
