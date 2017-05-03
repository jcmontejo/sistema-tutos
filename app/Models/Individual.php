<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    
	public $table = "individuals";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "students_attended",
		"semester",
		"turn",
		"campus",
		"docent",
		"date",
		"problematic",
		"objective_general",
		"elaboration",
		"vobo",
		"directors_id"
	];

	public static $rules = [
	    "students_attended" => "required",
		"semester" => "required",
		"turn" => "required",
		"campus" => "required",
		"date" => "required",
		"problematic" => "required",
		"elaboration" => "required",
		"vobo" => "required"
	];

	public function director()
	{
		return $this->belongsTo('App\Models\Directors');
	}

	
	/**
     * Obtain the elements of this general program
     */
    public function itemindividuals()
    {
        return $this->hasMany('App\Models\Itemindividual');
    }


}
