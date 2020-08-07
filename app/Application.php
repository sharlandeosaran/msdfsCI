<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Application extends Model
{

    public function getIpAttribute($value)
    {
        return decrypt($value);
    }
    public function setIpAttribute($value)
    {
        $this->attributes['ip'] = encrypt($value);
    }

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }

    public function applicants()
    {
        return \App\Person::
                leftJoin('applicants', 'applicants.person_id', 'people.id')->
                where('applicants.application_id', $this->id)->
                orderBy('applicants.order', 'asc')->
                get();
    }

    public function status()
    {
        return \App\Status::find($this->status_id);
    }

    public function getStatusAttribute($value)
    {
        return $this->status()->status;
    }

    public function getStatusColourAttribute($value)
    {
        switch ($this->status_id) {
            case '1':
                return 'default';
                break;

            case '2':
                return 'info';
                break;

            case '3':
                return 'success';
                break;

            case '4':
                return 'warning';
                break;

            case '5':
                return 'danger';
                break;
            
            default:
                return 'default';
                break;
        }
        return $this->status()->status;
    }

    public function getFormAttribute($value)
    {
        return \App\Form::find($this->form_id);
    }

    public function getFormTypeAttribute($value)
    {
        if ($this->form) {
            return $this->form->form;
        } else {
            return;
        }
    }

    public function getApplicantAttribute($value)
    {
        return \App\Person::
                leftJoin('applicants', 'applicants.person_id', 'people.id')->
                leftJoin('person_household', 'person_household.person_id', 'people.id')->
                leftJoin('households', 'person_household.household_id', 'households.id')->
                leftJoin('communities', 'households.community_id', 'communities.id')->
                leftJoin('regions', 'communities.region_code', 'regions.code')->
                where('applicants.application_id', $this->id)->
                where('households.active', '1')->
                first();
    }

    public function getHouseholdAttribute($value)
    {
        // dd(\App\Household::find($this->applicant->household_id));
        if ($this->applicant->household_id) {
            return \App\Household::find($this->applicant->household_id);
        } else {
            return;
        }
    }

    public function getHouseholdPeopleAttribute($value)
    {
        return \App\PersonHousehold::where('household_id', $this->applicant->household_id)->get();
    }

    public function form_critical_incident()
    {
        return \App\FormCriticalIncident::where('application_id', $this->id)->first();
        return $this->hasOne('App\FormCriticalIncident', 'application_id', $this->id);
    }
}
