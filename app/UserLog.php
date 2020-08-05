<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    
    protected $table = 'user_logs';
    
    public function user(){
		return \App\User::find($this->user_id);
	}

    public function getDateAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }

    public function getTimeAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('g:i a');
    }
}
