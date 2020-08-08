<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
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

    public function getContactAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setContactAttribute($value)
    {
        $this->attributes['contact'] = $value? encrypt($value) : null;
    }

    public function getRentalAmountAttribute($value)
    {
        return '$'.number_format($this->attributes['rental_amount'],2);
    }

    public function household()
    {
        return $this->hasOne('App\Household', 'id', 'household_id');
    }
}
