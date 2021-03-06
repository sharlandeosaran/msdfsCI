<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalIncome extends Model
{
    protected $table = 'total_income';
	public $timestamps = false;
    
    public function scopeOrdered($query){
        return $query->orderBy('id', 'asc')->get();
    }
}
