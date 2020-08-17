<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleRent extends Model
{
    protected $table = 'schedule_rent';
	public $timestamps = false;

    public function getLandlordAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setLandlordAttribute($value)
    {
        $this->attributes['landlord'] = $value? encrypt($value) : null;
    }

    public function getItemAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setItemAttribute($value)
    {
        $this->attributes['item'] = $value? encrypt($value) : null;
    }
}
