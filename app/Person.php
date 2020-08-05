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
        return decrypt($value);
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = encrypt($value);
    }

    public function getSurnameAttribute($value)
    {
        return decrypt($value);
    }
    public function setSurnameAttribute($value)
    {
        $this->attributes['surname'] = encrypt($value);
    }

    public function getOthernameAttribute($value)
    {
        return decrypt($value);
    }
    public function setOthernameAttribute($value)
    {
        $this->attributes['othername'] = encrypt($value);
    }

    public function getEmailAttribute($value)
    {
        return decrypt($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = encrypt($value);
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

    public function getEmploymentStatusOtherAttribute($value)
    {
        return decrypt($value);
    }
    public function setEmploymentStatusOtherAttribute($value)
    {
        $this->attributes['employment_status_other'] = encrypt($value);
    }

    public function getPrimaryMobileContactAttribute($value)
    {
        return decrypt($value);
    }
    public function setPrimaryMobileContactAttribute($value)
    {
        $this->attributes['primary_mobile_contact'] = encrypt($value);
    }

    public function getSecondaryMobileContactAttribute($value)
    {
        return decrypt($value);
    }
    public function setSecondaryMobileContactAttribute($value)
    {
        $this->attributes['secondary_mobile_contact'] = encrypt($value);
    }

    public function getLandLineTelephoneContactAttribute($value)
    {
        return decrypt($value);
    }
    public function setLandLineTelephoneContactAttribute($value)
    {
        $this->attributes['land_line_telephone_contact'] = encrypt($value);
    }

    public function getAgeAttribute($value)
    {
        return age($this->attributes['dob']);
    }

    public function getGenderAttribute($value)
    {
        if ($this->attributes['covid_status_id'] == 'M') {
            return 'Male';
        } else {
            return 'Female';
        }
        
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

    public function applicant()
    {
        return $this->belongsTo('App\Applicant');
    }
}
