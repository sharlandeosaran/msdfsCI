<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
	public $timestamps = false;

    public function getAddress1Attribute($value)
    {
        return decrypt($value);
    }
    public function setAddress1Attribute($value)
    {
        $this->attributes['address1'] = encrypt($value);
    }

    public function getAddress2Attribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setAddress2Attribute($value)
    {
        $this->attributes['address2'] = $value? encrypt($value) : null;
    }

    public function getTotalIncomeAttribute()
    {
        return \App\TotalIncome::find($this->total_income_id);
    }

    public function getHousingTypeAttribute()
    {
        return \App\HousingType::find($this->housing_type_id);
    }

    public function getCommunityAttribute()
    {
        return \App\Community::find($this->community_id);
    }

    public function getAddressAttribute()
    {
        $address = $this->address1;

        if ($this->address2) {
            $address .= '<br>'.$this->address2;
        }
        if ($this->community) {
            $address .= ',<br>'.$this->community->community;
        }
        // if ($this->community->region) {
        //     $address .= ',<br>'.$this->community->region;
        // }
        // dd($address);

        return $address;
    }
    
    public function scopeCommunities($query){
        return $query->groupBy('community_id')->pluck('community_id')->toArray();
    }
    
    public function scopeRegions($query){
        return \App\Community::
                        leftJoin('regions', 'communities.region_code', 'regions.code')->
                        whereIn('communities.id', \App\Household::communities())->
                        pluck('regions.id')->
                        toArray();
    }
}
