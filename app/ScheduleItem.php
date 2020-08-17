<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleItem extends Model
{
	public $timestamps = false;

    public function getItemAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setItemAttribute($value)
    {
        $this->attributes['item'] = $value? encrypt($value) : null;
    }
}
