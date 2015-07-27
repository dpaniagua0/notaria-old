<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    
	public $table = "roles";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"display_name",
		"description"
	];

	public static $rules = [
	    "name" => "required",
		"display_name" => "required"
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
