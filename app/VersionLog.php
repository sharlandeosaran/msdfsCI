<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VersionLog extends Model
{
    
    protected $table = 'version_logs';
    
    public function user(){
		return \App\User::find($this->user_id);
	}

    public function getDateAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }

    public function getTimeAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('g:i a');
    }

    public function getLatestAttribute($value)
    {
        $last = \App\VersionLog::orderBy('id', 'desc')->first();
        if ($last) {
            return $last->release .'.'.$last->feature .'.'.$last->update;
        } else {
            return '0.0.0';
        }
    }

    public function getVersionAttribute($value)
    {
        if ($this) {
            return $this->release .'.'.$this->feature .'.'.$this->update;
        } else {
            return '0.0.0';
        }
    }
	
	public function scopeOrdered($query){
		return $query->orderBy('id', 'desc')->get();
	}
}
