<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
	public $timestamps = false;

    public function getInsurerNameAttribute($value)
    {
        return decrypt($value);
    }
    public function setInsurerNameAttribute($value)
    {
        $this->attributes['insurer_name'] = encrypt($value);
    }

    public function getInsurerAddressAttribute($value)
    {
        return decrypt($value);
    }
    public function setInsurerAddressAttribute($value)
    {
        $this->attributes['insurer_address'] = encrypt($value);
    }

    public function getInsurerContactAttribute($value)
    {
        return decrypt($value);
    }
    public function setInsurerContactAttribute($value)
    {
        $this->attributes['insurer_contact'] = encrypt($value);
    }
}
