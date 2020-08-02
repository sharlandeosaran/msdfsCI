<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    protected $table = 'marital_status';
	public $timestamps = false;
    
    public function scopeOrdered($query){
        return $query->orderBy('id', 'asc')->get();
    }
}
