<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'communities';
	public $timestamps = false;

    public function region()
    {
        return \App\Region::where('code', $this->region_code)->first();
    }

    public function getRegionAttribute($value)
    {
        $region = $this->region();
        
        
        return $region? $region->region : 'N/A';
    }
	
	public function scopeOrdered($query){
		return $query->orderBy('community', 'asc')->get();
	}
}
