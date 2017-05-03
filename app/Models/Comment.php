<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
	public $table = "comments";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"body",
		"student_id"
	];

	public static $rules = [
	    "name" => "required",
		"body" => "required"
	];

	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}

}
