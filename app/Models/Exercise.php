<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    
	public $table = "exercises";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "activity",
	    "student_id"
	];

	public static $rules = [
	    "activity" => "required"
	];

	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}

}
