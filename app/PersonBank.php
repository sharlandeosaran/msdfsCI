<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonBank extends Model
{
    protected $table = 'person_bank';

    public function getPersonAttribute()
    {
        return \App\Person::find($this->person_id);
    }

    public function getBankAttribute()
    {
        return \App\Bank::find($this->bank_id);
    }

    public function getBankNameAttribute()
    {
        if ($this->bank) {
            return $this->bank->bank;
        } else {
            return;
        }
    }

    public function getBranchAttribute($value)
    {
        if ($this->bank_id == 2 && $this->scotia_branch()) {
            return $this->scotia_branch()->branch;
        } else {
            return $value? decrypt($value) : null;
        }
    }
    public function setBranchAttribute($value)
    {
        $this->attributes['branch'] = $value? encrypt($value) : null;
    }

    public function scotia_branch()
    {
        return \App\ScotiaBranch::find($this->scotia_branch_id);
    }

    public function getAccountAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setAccountAttribute($value)
    {
        $this->attributes['account'] = $value? encrypt($value) : null;
    }

}
