<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    
	public $table = "periods";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"start_period",
		"end_period",
		"status"
	];

	public static $rules = [
	    "name" => "required",
		"start_period" => "required",
		"end_period" => "required",
		
	];

}
