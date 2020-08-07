<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    //
    protected $table ='email_log';

    public function getSubjectAttribute($value)
    {
        return decrypt($value);
    }
    public function setSubjectAttribute($value)
    {
        $this->attributes['subject'] = encrypt($value);
    }

    public function getDetailsAttribute($value)
    {
        return decrypt($value);
    }
    public function setDetailsAttribute($value)
    {
        $this->attributes['details'] = $value? encrypt($value) : encrypt('Failed');
    }
	
	public function scopeOrdered($query){
		return $query->orderBy('id', 'desc')->get();
	}
}
