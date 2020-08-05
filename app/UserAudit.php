<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAudit extends Model
{
    //
    protected $table = 'user_audit';
	
	public function changedBy(){
		return $this->hasOne('App\User', 'id' , 'changed_by');
	}
	
	public function user(){
		return \App\User::find($this->user_id);
	}

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }

    public function getAttributeAttribute($value)
    {
        return ucfirst($value);
	}
	
	public function getOldAttribute($value)
	{
		switch ($this->attribute) {
			case 'Admin':
				return $value == '0'? 'General User' : 'Administrator';
				break;
			
			case 'Active':
				return $value == '0'? 'Inactive' : 'Active';
				break;
			
			default:
				return $value;
				break;
		}
	}
	
	public function getNewAttribute($value)
	{
		switch ($this->attribute) {
			case 'Admin':
				return $value == '0'? 'General User' : 'Administrator';
				break;
			
			case 'Active':
				return $value == '0'? 'Inactive' : 'Active';
				break;
			
			default:
				return $value;
				break;
		}
	}
	
	public function scopeOrdered($query){
		return $query->orderBy('id', 'desc')->get();
	}
}
