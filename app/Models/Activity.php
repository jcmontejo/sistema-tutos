<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    
	public $table = "activities";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "title",
		"image",
		"link_to_activity",
		"directors_id"
	];

	public static $rules = [
	    "title" => "required",
		"image" => "required",
		"link_to_activity" => "required|url"
	];

}
