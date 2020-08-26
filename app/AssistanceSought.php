<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssistanceSought extends Model
{
    protected $table = 'assistance_sought';
	public $timestamps = false;
    
    public function scopeOrdered($query){
        return $query->orderBy('id', 'asc')->get();
    }
}
