<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCIItemsLost extends Model
{
    protected $table = 'form_ci_items_lost';
    public $timestamps = false;
    
    public function item()
    {
        return $this->hasOne('App\ItemsLostOrDamaged', 'id', 'item_id');
    }
    
    public function scopeItems($query){
        return $query->groupBy('item_id')->pluck('item_id')->toArray();
    }
}
