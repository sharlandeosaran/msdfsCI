<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatusAudit extends Model
{
    //
    protected $table = 'application_status_audit';

    public function getDetailsAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setDetailsAttribute($value)
    {
        $this->attributes['details'] = $value? encrypt($value) : null;
    }

    public function getUserNameAttribute($value)
    {
        return $value? decrypt($value) : $this->changedBy->name;
    }
    public function setUserNameAttribute($value)
    {
        $this->attributes['user_name'] = $value? encrypt($value) : null;
    }

    public function getUserRoleAttribute($value)
    {
        return $value? decrypt($value) : $this->changedBy->role->role;
    }
    public function setUserRoleAttribute($value)
    {
        $this->attributes['user_role'] = $value? encrypt($value) : null;
    }
	
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
