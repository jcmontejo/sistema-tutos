<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
	public $table = "students";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"father_last_name",
		"mother_last_name",
		"enrollment",
		"email",
		"grade",
		"group",
		"turn",
		"address",
		"phone",
		"emergency_number",
		"state",
		"municipality",
		"password",
		"user_id",
		"tutors_id"
	];

	public static $rules = [
	    "name" => "required|alpha|max:30",
		"father_last_name" => "required|alpha||max:30",
		"mother_last_name" => "required|alpha||max:30",
		"enrollment" => "required|alpha_num",
		"email" => "required|email|unique:students",
		"grade" => "required|numeric",
		"group" => "required|alpha|max:1",
		"turn" => "required|alpha|max:20",
		"address" => "required|alpha|max:30",
		"phone" => "required|digits_between:10,10",
	];

	public function getFullNameAttribute()
    {
    	return ucfirst($this->name)	. ' ' . ucfirst($this->father_last_name). ' ' . ucfirst($this->mother_last_name);
    }
    
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tutor()
	{
		return $this->belongsTo('App\Models\Tutors');
	}

	public function tasks()
	{
		 return $this->hasMany('App\Models\Task');
	}

	public function comments()
	{
		 return $this->hasMany('App\Models\Comment');
	}

	public function exercises()
	{
		 return $this->hasMany('App\Models\Exercise');
	}

}
