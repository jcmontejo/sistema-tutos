<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
	public $table = "tasks";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "type",
		"name",
		"description",
		"date_delivery",
		"file",
		"student_id"
	];

	public static $rules = [
	    "type" => "required",
		"name" => "required",
		"description" => "required",
		"date_delivery" => "required"
	];

	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}

}
