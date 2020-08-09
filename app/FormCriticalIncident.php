<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCriticalIncident extends Model
{
    protected $table = 'form_critical_incident';
	public $timestamps = false;

    public function getDisasterOtherAttribute($value)
    {
        return decrypt($value);
    }
    public function setDisasterOtherAttribute($value)
    {
        $this->attributes['disaster_other'] = encrypt($value);
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

    public function insurer()
    {
        return \App\Insurer::where('form_critical_incident_id', $this->id)->first();
    }

    public function getItemsLostAttribute()
    {
        return \App\FormCIItemsLost::
            leftJoin('items_lost_or_damaged', 'items_lost_or_damaged.id', 'form_ci_items_lost.item_id')->
            where('form_ci_items_lost.form_critical_incident_id', $this->id)->
            orderBy('items_lost_or_damaged.item', 'asc')->
            get();
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
