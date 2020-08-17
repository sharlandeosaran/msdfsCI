<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleApplication extends Model
{
	public $timestamps = false;

    public function getApplicantNameAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setApplicantNameAttribute($value)
    {
        $this->attributes['applicant_name'] = $value? encrypt($value) : null;
    }

    public function getAddressAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = $value? encrypt($value) : null;
    }

    public function getSupplierAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setSupplierAttribute($value)
    {
        $this->attributes['supplier'] = $value? encrypt($value) : null;
    }

    public function getInvoiceAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setInvoiceAttribute($value)
    {
        $this->attributes['invoice'] = $value? encrypt($value) : null;
    }

    public function getContactAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setContactAttribute($value)
    {
        $this->attributes['contact'] = $value? encrypt($value) : null;
    }
}
