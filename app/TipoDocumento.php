<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    
	public $table = "tipo_documentos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "tipo"
	];

	public static $rules = [
	    "tipo" => "required"
	];

}
