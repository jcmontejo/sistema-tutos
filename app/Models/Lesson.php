<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    
	public $table = "lessons";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "date",
		"hora",
		"tutor_id"
	];

	public static $rules = [
	    "date" => "required|date",
		"hora" => "required"
	];

	public function tutor()
	{
		return $this->belongsTo('App\Models\Tutors');
	}

}
