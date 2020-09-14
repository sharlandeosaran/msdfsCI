<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalBoard extends Model
{
	public $timestamps = false;
    
    public function scopeOrdered($query){
        return $query->orderBy('local_board', 'asc')->get();
    }
}
