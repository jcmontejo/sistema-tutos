<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directors extends Model
{
    
	public $table = "directors";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"father_last_name",
		"mother_last_name",
		"email",
		"address",
		"phone",
		"academic_title",
		"password",
		"user_id",
	];

	public static $rules = [
	    "name" => "required",
		"father_last_name" => "required",
		"mother_last_name" => "required",
		"email" => "required",
		"address" => "required",
		"phone" => "required",
		"academic_title" => "required"
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
    * Obtain the general program
    */
    public function general()
    {
        return $this->hasMany('App\Models\General');
    }

    /**
    * Obtain the final report 
    */
    public function finalreport()
    {
        return $this->hasMany('App\Models\Finalreport');
    }

     /**
    * Obtain the  
    */
    public function tutoringprogram()
    {
        return $this->hasMany('App\Models\Tutoring');
    }

}
