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

    public function getRecommenderNameAttribute($value)
    {
        return decrypt($this->attributes['recommender_first_name']) .' '. decrypt($this->attributes['recommender_surname']);
    }

    public function getRecommenderFirstNameAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setRecommenderFirstNameAttribute($value)
    {
        $this->attributes['recommender_first_name'] = $value? encrypt($value) : null;
    }

    public function getRecommenderSurnameAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setRecommenderSurnameAttribute($value)
    {
        $this->attributes['recommender_surname'] = $value? encrypt($value) : null;
    }

    public function getRecommenderJobTitleInfoAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setRecommenderJobTitleInfoAttribute($value)
    {
        $this->attributes['recommender_job_title_info'] = $value? encrypt($value) : null;
    }

    public function getRecommenderContactNoAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setRecommenderContactNoAttribute($value)
    {
        $this->attributes['recommender_contact_no'] = $value? encrypt($value) : null;
    }

    public function getRecommenderEmailAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setRecommenderEmailAttribute($value)
    {
        $this->attributes['recommender_email'] = $value? encrypt($value) : null;
    }

    public function getRecommenderHomeAddressAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setRecommenderHomeAddressAttribute($value)
    {
        $this->attributes['recommender_home_address'] = $value? encrypt($value) : null;
    }

    public function employment_list()
    {
        return \App\EmploymentList::find($this->employment_list_id);
    }

    public function getEmploymentClassificationAttribute($value)
    {
        if ($this->employment_list()) {
            return $this->employment_list()->employment_classification;
        } else {
            return;
        }
    }

    public function recommender_job_title()
    {
        return \App\JobTitle::find($this->recommender_job_title_id);
    }

    public function getRecommenderJobTitleAttribute($value)
    {
        if ($this->recommender_job_title()) {
            return $this->recommender_job_title()->title;
        } else {
            return;
        }
    }

    public function recommender_city_town()
    {
        return \App\Community::find($this->recommender_city_town_id);
    }

    public function getRecommenderCityTownAttribute($value)
    {
        if ($this->recommender_city_town()) {
            return $this->recommender_city_town()->community;
        } else {
            return;
        }
    }

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->effective_date)->format('F jS, Y');
    }
}
