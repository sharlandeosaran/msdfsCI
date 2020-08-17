<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegion extends Model
{
	public $timestamps = false;

    public function getRegionAttribute($value)
    {
        return $this->attributes['region_id'];
    }
}
