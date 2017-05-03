<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

	public $table = "items";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	"theme",
	"activity",
	"objective",
	"resources",
	"schedule",
	"evaluation_and_follow",
	"general_id",
	];

	public static $rules = [
	"theme" => "required",
	"activity" => "required",
	"objective" => "required",
	"resources" => "required",
	"schedule" => "required",
	"evaluation_and_follow" => "required"
	];

	/**
 	* Return the post owner of this comment
 	*/
	public function program()
	{
		return $this->belongsTo('App\Models\General');
	}

}
