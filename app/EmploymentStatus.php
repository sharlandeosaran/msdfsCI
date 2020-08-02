<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    protected $table = 'employment_status';
	public $timestamps = false;
    
    public function scopeOrdered($query){
        return $query->orderBy('id', 'asc')->get();
    }
}
