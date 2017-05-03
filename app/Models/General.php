<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    
	public $table = "generals";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "students_attended",
		"school_cycle",
		"campus",
		"turn",
		"date",
		"general_objective",
		"elaboration",
		"vobo",
		"directors_id"
	];

	public static $rules = [
	    "students_attended" => "required|numeric",
		//"school_cycle" => "required",
		"campus" => "required",
		"turn" => "required",
		"date" => "required",
		"general_objective" => "required",
		"elaboration" => "required",
		"vobo" => "required"
	];

    /**
 	* Return the coordinador owner of this general program
 	*/
	public function director()
	{
		return $this->belongsTo('App\Models\Directors');
	}

	
	/**
     * Obtain the elements of this general program
     */
    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }


}
