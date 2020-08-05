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

    public function getPassportAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setPassportAttribute($value)
    {
        $this->attributes['passport'] = $value? encrypt($value) : null;
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
