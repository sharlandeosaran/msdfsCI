<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    public function applications()
    {
        $nums = \App\ScheduleApplication::where('schedule_id', $this->id)->pluck('application_id')->toArray();
        return \App\Application::whereIn('id', $nums)->get();
    }

    public function type()
    {
        return \App\ScheduleType::find($this->type_id);
    }

    public function getTypeAttribute($value)
    {
        if ($this->type()) {
            return $this->type()->type;
        } else {
            return;
        }
    }

    public function region()
    {
        return \App\Region::find($this->region_id);
    }

    public function getRegionAttribute($value)
    {
        if ($this->region()) {
            return $this->region()->region;
        } else {
            return;
        }
    }

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }
	
	public function createdBy(){
		return $this->hasOne('App\User', 'id' , 'created_by');
	}
}
