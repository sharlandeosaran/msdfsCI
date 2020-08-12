<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    public function application()
    {
        return $this->belongsTo('App\Application');
    }

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }
	
	public function createdBy(){
		return $this->hasOne('App\User', 'id' , 'created_by');
	}
}
