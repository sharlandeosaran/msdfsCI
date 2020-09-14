<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalBoard extends Model
{
	public $timestamps = false;
    
    public function scopeOrdered($query){
        return $query->orderBy('id', 'asc')->get();
    }
}
