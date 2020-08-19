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

	public function approvals()
	{
		return \App\ApplicationApproval::where('application_status_audit_id', $this->id)->get();
	}

    public function getApprovalsAttribute($value)
    {
        $list = [];
        $approvals = $this->approvals();

        if ($approvals) {
            foreach ($approvals as $approval) {
                $list[$approval->type][] = [
                    'key' => $approval->key,
                    'value' => $approval->value,
                ];
            }
        }
        
        return $list;
    }

    // approvals

    public function getApprovalGrantsAttribute($value)
    {
        return \App\ApplicationApproval::
                where('application_status_audit_id', $this->id)->
                get();
    }

    public function getApprovalGrantFoodCardAttribute($value)
    {
        $list = [];
        $get = \App\ApplicationApproval::
                where('application_status_audit_id', $this->id)->
                where('key', 'LIKE', 'emergency_food_card_%')->
                get();

        foreach ($get as $row) {
            $list[$row->key] = $row->value;
        }
        return $list;
    }

    public function getApprovalGrantRentAttribute($value)
    {
        $list = [];
        $get = \App\ApplicationApproval::
                where('application_status_audit_id', $this->id)->
                where('key', 'LIKE', 'general_assistance_rent_%')->
                get();

        foreach ($get as $row) {
            $list[$row->key] = $row->value;
        }
        return $list;
    }

    public function getApprovalGrantCounsellingServicesAttribute($value)
    {
        $list = [];
        $get = \App\ApplicationApproval::
                where('application_status_audit_id', $this->id)->
                where('key', 'LIKE', 'counselling_services%')->
                get();

        foreach ($get as $row) {
            $list[$row->key] = $row->value;
        }
        return $list;
    }

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }
	
	public function scopeOrdered($query){
		return $query->orderBy('id', 'desc')->get();
	}
}
