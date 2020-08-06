<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
	public $timestamps = false;
	
	public function scopeOrdered($query){
		return $query->orderBy('region', 'asc')->get();
	}
}
