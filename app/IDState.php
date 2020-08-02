<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IDState extends Model
{
    protected $table = 'id_states';
	public $timestamps = false;
    
    public function scopeOrdered($query){
        return $query->orderBy('id', 'asc')->get();
    }
}
