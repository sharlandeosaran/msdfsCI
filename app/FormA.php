<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormA extends Model
{
    protected $table = 'form_a';
	public $timestamps = false;

    public function application()
    {
        return $this->belongsTo('App\Application');
    }

    public function getEmployerNameAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setEmployerNameAttribute($value)
    {
        $this->attributes['employer_name'] = $value? encrypt($value) : null;
    }

    public function getEmployerAddressAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setEmployerAddressAttribute($value)
    {
        $this->attributes['employer_address'] = $value? encrypt($value) : null;
    }

    public function getEmployerAuthorizedPersonAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setEmployerAuthorizedPersonAttribute($value)
    {
        $this->attributes['employer_authorized_person'] = $value? encrypt($value) : null;
    }

    public function getEmployerContactAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setEmployerContactAttribute($value)
    {
        $this->attributes['employer_contact'] = $value? encrypt($value) : null;
    }
}
