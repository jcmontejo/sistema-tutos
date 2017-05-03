<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itemindividual extends Model
{
    
	public $table = "itemindividuals";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "objetives",
	    "activities",
		"date",
		"resources",
		"evidence",
		"individual_id",
	];

	public static $rules = [
		"objetives" => "required",
	    "activities" => "required",
		"date" => "required",
		"resources" => "required",
		"evidence" => "required"
	];

	public function individual()
	{
		return $this->belongsTo('App\Models\Individual');
	}

}
