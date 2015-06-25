<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    
	public $table = "conceptos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "concepto"
	];

	public static $rules = [
	    "concepto" => "required"
	];

}
