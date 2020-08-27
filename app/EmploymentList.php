<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentList extends Model
{
    protected $table = 'employment_list';
	public $timestamps = false;
    
    public function scopeEmploymentlist($query){
        return \App\EmploymentList::
            pluck('employment_classification', 'slug')->
            toArray();
    }
}
