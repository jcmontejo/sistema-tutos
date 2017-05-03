<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $table = "estados";

	public $primaryKey = "id";
    
	public $timestamps = true;
}
