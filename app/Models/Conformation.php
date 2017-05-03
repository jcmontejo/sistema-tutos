<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conformation extends Model
{
    
	public $table = "conformations";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "body",
	    "director_id",
	];

	public static $rules = [
	    "body" => "required"
	];

}
