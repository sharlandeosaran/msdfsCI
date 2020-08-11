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

    public function landlord()
    {
        return $this->hasOne('App\Landlord', 'household_id', 'id');
    }

    public function children()
    {
        return \App\Person::
            leftJoin('person_household', 'person_household.person_id', 'people.id')->
            where('person_household.household_id', $this->id)->
            whereIn('person_household.relationship_id',[2,6] )->
            get();
    }

    public function getChildrenCountAttribute()
    {
        return count($this->children());
    }

    public function primary_students()
    {
        return \App\Person::
            leftJoin('person_household', 'person_household.person_id', 'people.id')->
            where('person_household.household_id', $this->id)->
            whereIn('people.employment_status_id',[7] )->
            get();
    }

    public function getPrimaryStudentCountAttribute()
    {
        return count($this->primary_students());
    }

    public function secondary_students()
    {
        return \App\Person::
            leftJoin('person_household', 'person_household.person_id', 'people.id')->
            where('person_household.household_id', $this->id)->
            whereIn('people.employment_status_id',[8] )->
            get();
    }

    public function getSecondaryStudentCountAttribute()
    {
        return count($this->secondary_students());
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
