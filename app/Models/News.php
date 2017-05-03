<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    
	public $table = "news";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "title",
		"link_to_pdf",
		"directors_id"
	];

	public static $rules = [
	    "title" => "required|alpha",
		"link_to_pdf" => "required|url"
	];

}
