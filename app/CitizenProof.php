<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitizenProof extends Model
{
    protected $table = 'citizen_proof';
	public $timestamps = false;
    
    public function scopeOrdered($query){
        return $query->orderBy('id', 'asc')->get();
    }
}
