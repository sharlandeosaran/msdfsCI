<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
	public $timestamps = false;

    public function getAddress1Attribute($value)
    {
        return decrypt($value);
    }
    public function setAddress1Attribute($value)
    {
        $this->attributes['address1'] = encrypt($value);
    }

    public function getAddress2Attribute($value)
    {
        return decrypt($value);
    }
    public function setAddress2Attribute($value)
    {
        $this->attributes['address2'] = encrypt($value);
    }
}
