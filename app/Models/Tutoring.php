<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutoring extends Model
{
    
	public $table = "tutorings";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "school_cycle",
		"campus",
		"date",
		"presentation",
		"general_objective",
		"specific_objetives",
		"elaboration",
		"vobo",
		"directors_id"
	];

	public static $rules = [
	    //"school_cycle" => "required",
		"campus" => "required",
		"date" => "required|date",
		"presentation" => "required" ,
		"general_objective" => "required",
		"specific_objetives" => "required",
		"elaboration" => "required",
		"vobo" => "required"
	];

	/**
 	* Return the coordinador owner of this general program
 	*/
	public function director()
	{
		return $this->belongsTo('App\Models\Directors');
	}


}
