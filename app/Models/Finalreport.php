<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finalreport extends Model
{
    
	public $table = "finalreports";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "students_attended",
		"school_cycle",
		"campus",
		"turn",
		"date",
		"guidance",
		"presentation",
		"activities_performed",
		"results",
		"evaluation",
		"suggestions",
		"elaboration",
		"vobo",
		"directors_id"
	];

	public static $rules = [
	    "students_attended" => "required|numeric",
		//"school_cycle" => "required",
		"campus" => "required",
		"turn" => "required",
		"date" => "required|date",
		"guidance" => "required|max:800",
		"presentation" => "required|max:1500",
		"activities_performed" => "required|max:2000",
		"results" => "required|max:2000",
		"evaluation" => "required|max:2000",
		"suggestions" => "required|max:2000",
		"elaboration" => "required|max:800",
		"vobo" => "required|max:800"
	];

	/**
 	* Return the coordinador owner of this general program
 	*/
	public function director()
	{
		return $this->belongsTo('App\Models\Directors');
	}


}
