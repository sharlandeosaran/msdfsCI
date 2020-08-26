<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Person extends Model
{

    public function getNameAttribute($value)
    {
        return decrypt($this->attributes['first_name']) .' '. decrypt($this->attributes['surname']);
    }

    public function getFirstNameAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = $value? encrypt($value) : null;
    }

    public function getSurnameAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setSurnameAttribute($value)
    {
        $this->attributes['surname'] = $value? encrypt($value) : null;
    }

    public function getOthernameAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setOthernameAttribute($value)
    {
        $this->attributes['othername'] = $value? encrypt($value) : null;
    }

    public function getEmailAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = $value? encrypt($value) : null;
    }

    public function getDriversPermitAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setDriversPermitAttribute($value)
    {
        $this->attributes['drivers_permit'] = $value? encrypt($value) : null;
    }

    public function getPassportAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setPassportAttribute($value)
    {
        $this->attributes['passport'] = $value? encrypt($value) : null;
    }

    public function getNisAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setNisAttribute($value)
    {
        $this->attributes['nis'] = $value? encrypt($value) : null;
    }

    public function getMaritalStatusOtherAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setMaritalStatusOtherAttribute($value)
    {
        $this->attributes['marital_status_other'] = $value? encrypt($value) : null;
    }

    public function getEmploymentStatusOtherAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setEmploymentStatusOtherAttribute($value)
    {
        $this->attributes['employment_status_other'] = $value? encrypt($value) : null;
    }

    public function getJobTitleAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setJobTitleAttribute($value)
    {
        $this->attributes['job_title'] = $value? encrypt($value) : null;
    }

    public function getPrimaryMobileContactAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setPrimaryMobileContactAttribute($value)
    {
        $this->attributes['primary_mobile_contact'] = $value? encrypt($value) : null;
    }

    public function getSecondaryMobileContactAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setSecondaryMobileContactAttribute($value)
    {
        $this->attributes['secondary_mobile_contact'] = $value? encrypt($value) : null;
    }

    public function getLandLineTelephoneContactAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setLandLineTelephoneContactAttribute($value)
    {
        $this->attributes['land_line_telephone_contact'] = $value? encrypt($value) : null;
    }

    public function getAgeAttribute($value)
    {
        return age($this->attributes['dob']);
    }

    public function getGenderAttribute($value)
    {
        if ($this->attributes['gender'] == 'M') {
            return 'Male';
        } else if ($this->attributes['gender'] == 'F') {
            return 'Female';
        } else {
            return;
        }
        
    }

    public function applicant()
    {
        return $this->belongsTo('App\Applicant');
    }

    public function national_id_state()
    {
        return \App\IDState::find($this->national_id_state_id);
    }

    public function getNationalIdStateAttribute($value)
    {
        if ($this->national_id_state()) {
            return $this->national_id_state()->id_state;
        } else {
            return;
        }
    }

    public function getEmploymentStatusAttribute($value)
    {
        $employment_status = \App\EmploymentStatus::find($this->employment_status_id);
        if ($employment_status) {
            if ($employment_status->status == 'Other' && $this->attributes['employment_status_other']) {
                return $this->employment_status_other;
            } else {
                return $employment_status->status;
            }
        } else {
            return;
        }
    }

    public function getMaritalStatusAttribute($value)
    {
        $marital_status = \App\MaritalStatus::find($this->marital_status_id);
        if ($marital_status) {
            if ($marital_status->status == 'Other' && $this->attributes['marital_status_other']) {
                return $this->marital_status_other;
            } else {
                return $marital_status->status;
            }
        } else {
            return;
        }
    }

    public function person_household()
    {
        return \App\PersonHousehold::where('person_id', $this->id)->where('active', 1)->orderBy('created_at', 'desc')->first();
    }

    public function getHouseholdRelationshipAttribute($value)
    {
        if ($this->person_household()) {
            return $this->person_household()->relationship;
        } else {
            return;
        }
    }
}
