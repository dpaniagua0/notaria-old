<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Adquiriente extends Model
{
    
	public $table = "adquirientes";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"rfc",
		"curp"
	];

	public static $rules = [
	    "nombre" => "required",
		"rfc" => "required",
		"curp" => "required"
	];

}
