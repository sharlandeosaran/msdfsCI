<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatusAudit extends Model
{
    //
    protected $table = 'application_status_audit';
	
	public function application(){
		return $this->hasOne('App\Application', 'id' , 'application_id');
	}
	
	public function changedBy(){
		return $this->hasOne('App\User', 'id' , 'changed_by');
	}
	
	public function oldStatus(){
		return $this->hasOne('App\Status', 'id' , 'status_old');
	}
	
	public function newStatus(){
		return $this->hasOne('App\Status', 'id' , 'status_new');
	}

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }
	
	public function scopeOrdered($query){
		return $query->orderBy('id', 'desc')->get();
	}
}
