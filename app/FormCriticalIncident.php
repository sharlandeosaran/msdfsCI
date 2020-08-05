<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCriticalIncident extends Model
{
    protected $table = 'form_critical_incident';
	public $timestamps = false;

    public function getOtherDisasterAttribute($value)
    {
        return decrypt($value);
    }
    public function setOtherDisasterAttribute($value)
    {
        $this->attributes['other_disaster'] = encrypt($value);
    }

    public function getHousingDamageAttribute($value)
    {
        return decrypt($value);
    }
    public function setHousingDamageAttribute($value)
    {
        $this->attributes['housing_damage'] = encrypt($value);
    }

    public function getHousingRepairsAttribute($value)
    {
        return decrypt($value);
    }
    public function setHousingRepairsAttribute($value)
    {
        $this->attributes['housing_repairs'] = encrypt($value);
    }

    public function application()
    {
        return $this->belongsTo('App\Application');
    }

    public function disaster()
    {
        return \App\Disaster::find($this->attributes['disaster_id']);
    }

    public function getDisasterAttribute($value)
    {
        $disaster = \App\Disaster::find($this->disaster_id);
        if ($disaster) {
            if ($disaster->disaster == 'Other' && $this->attributes['disaster_other']) {
                return $this->attributes['disaster_other'];
            } else {
                return $disaster->disaster;
            }
        } else {
            return 'N/A';
        }
        
    }
}
