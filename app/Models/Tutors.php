<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutors extends Model
{
    
	public $table = "tutors";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"father_last_name",
		"mother_last_name",
		"email",
		"address",
		"phone",
		"state",
		"municipality",
		"academic_title",
		"password",
		"user_id"
	];

	public static $rules = [
	    "name" => "required|alpha|max:30",
		"father_last_name" => "required|alpha|max:30",
		"mother_last_name" => "required|alpha|max:30",
		"email" => "required|email|unique:tutors",
		"address" => "required|alpha|max:30",
		"phone" => "required|digits_between:10,10",
		"academic_title" => "required|alpha"
	];

	public function getFullNameAttribute()
    {
    	return ucfirst($this->name)	. ' ' . ucfirst($this->father_last_name). ' ' . ucfirst($this->mother_last_name);
    }

    public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function students()
	{
		 return $this->hasMany('App\Models\Student');
	}

	public function lessons()
	{
		 return $this->hasMany('App\Models\Lesson');
	}

}
