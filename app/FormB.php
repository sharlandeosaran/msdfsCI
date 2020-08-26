<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormB extends Model
{
    protected $table = 'form_b';
	public $timestamps = false;

    public function application()
    {
        return $this->belongsTo('App\Application');
    }

    // public function getDisasterOtherAttribute($value)
    // {
    //     return $value? decrypt($value) : null;
    // }
    // public function setDisasterOtherAttribute($value)
    // {
    //     $this->attributes['disaster_other'] = $value? encrypt($value) : null;
    // }
}
