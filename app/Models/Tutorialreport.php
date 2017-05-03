<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorialreport extends Model
{
    
	public $table = "tutorialreports";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "students_attended",
		"campus",
		"semester",
		"turn",
		"docent",
		"date",
		"problematic",
		"general_objective",
		"students",
		"grade_and_group",
		"activities",
		"results",
		"observations",
		"suggestions_and_proposals",
		"vobo",
		"directors_id"
	];

	public static $rules = [
	    "students_attended" => "required",
		"campus" => "required",
		"semester" => "required",
		"turn" => "required",
		"date" => "required",
		"problematic" => "required",
		"general_objective" => "required",
		"students" => "required",
		"grade_and_group" => "required",
		"activities" => "required",
		"results" => "required",
		"observations" => "required",
		"suggestions_and_proposals" => "required",
		"vobo" => "required"
	];

}
