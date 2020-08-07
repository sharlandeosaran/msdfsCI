<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ErrorLog extends Model
{
    //
    protected $table ='error_log';

    public function getUserAttribute($value)
    {
        return decrypt($value);
    }
    public function setUserAttribute($value)
    {
        $this->attributes['user'] = encrypt($value);
    }

    public function getIpAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setIpAttribute($value)
    {
        $this->attributes['ip'] = encrypt($value);
    }

    public function getActionAttribute($value)
    {
        return decrypt($value);
    }
    public function setActionAttribute($value)
    {
        $this->attributes['action'] = encrypt($value);
    }

    public function getExceptionAttribute($value)
    {
        return decrypt($value);
    }
    public function setExceptionAttribute($value)
    {
        $this->attributes['exception'] = encrypt($value);
    }

	public function scopeOrdered($query){
		return $query->orderBy('id', 'desc')->get();
	}
	
    public function scopeAdminDashboard($query)
    {
        // current date
        $date = Carbon::now();
        $today = Carbon::now();
        $firstWeekDay = $date->startOfWeek(Carbon::SUNDAY);
        $lastWeek = $date->subDays(7);
        $list = [];

        // last week counts
        for ($i=1; $i <= 7; $i++) { 
            $getLast = \App\ErrorLog::
                            whereDate('created_at', $lastWeek->toDateString())->
                            get();

            $list['last'][$lastWeek->toDateString()] = count($getLast);
            $lastWeek->addDay();
        }

        // this week counts
        for ($i=1; $i <= 7; $i++) { 
            if ($firstWeekDay->toDateString() <= $today->toDateString()) {
                $getThis = \App\ErrorLog::
                                whereDate('created_at', $firstWeekDay->toDateString())->
                                get();

                $list['this'][$firstWeekDay->toDateString()] = count($getThis);
                $firstWeekDay->addDay();
            }
        }
        return $list;
    }
}
