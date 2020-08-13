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

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }
	
	public function createdBy(){
		return $this->hasOne('App\User', 'id' , 'created_by');
	}
}
