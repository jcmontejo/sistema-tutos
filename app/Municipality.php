<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    public $table = "municipios";

	public $primaryKey = "id";
    
	public $timestamps = true;
}
