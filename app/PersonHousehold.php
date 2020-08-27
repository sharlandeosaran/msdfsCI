<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonHousehold extends Model
{
    protected $table = 'person_household';

    public function getPersonAttribute()
    {
        return \App\Person::find($this->person_id);
    }

    public function getHouseholdAttribute()
    {
        return \App\Household::find($this->household_id);
    }

    public function getRelationshipAttribute()
    {
        return \App\Relationship::find($this->relationship_id);
    }

    public function getProofOfEarningsAttribute($value)
    {
        return \App\ApplicationDocument::
                where(function ($query) {
                    $query->orWhere('document', 'LIKE', '%proof_of_earnings_'.$this->person_id.'%');
                })->
                get();
    }
}
