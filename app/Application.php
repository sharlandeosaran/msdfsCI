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

    public function getContactAttribute($value)
    {
        return decrypt($value);
    }
    public function setContactAttribute($value)
    {
        $this->attributes['contact'] = encrypt($value);
    }

    public function getEmailAttribute($value)
    {
        return decrypt($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = encrypt($value);
    }

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }

    public function applicants()
    {
        return \App\Applicant::where('application_id', $this->id)->orderBy('order', 'asc')->get();
    }

    public function status()
    {
        return \App\Status::find($this->status_id);
    }

    public function getStatusAttribute($value)
    {
        return $this->status()->status;
    }
}
