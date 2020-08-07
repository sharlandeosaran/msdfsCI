<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsLostOrDamaged extends Model
{
    protected $table = 'items_lost_or_damaged';
	public $timestamps = false;
	
	public function scopeOrdered($query){
		return $query->orderBy('item', 'asc')->get();
	}
}
