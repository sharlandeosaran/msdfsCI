<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
	public $timestamps = false;
    
    public function scopeExtras($query){
        return $query->whereNotNull('label')->pluck('id')->toArray();
    }
    
    public function scopeOrdered($query){
        return $query->orderBy('title', 'asc')->get();
    }
}
