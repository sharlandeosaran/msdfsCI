<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Application extends Model
{

    public function getIpAttribute($value)
    {
        return decrypt($value);
    }
    public function setIpAttribute($value)
    {
        $this->attributes['ip'] = encrypt($value);
    }

    public function getSinceAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F jS, Y');
    }

    public function applicants()
    {
        return \App\Person::
                leftJoin('applicants', 'applicants.person_id', 'people.id')->
                where('applicants.application_id', $this->id)->
                orderBy('applicants.order', 'asc')->
                get();
    }

    public function status()
    {
        return \App\Status::find($this->status_id);
    }

    public function getStatusAttribute($value)
    {
        return $this->status()->status;
    }

    public function getStatusColourAttribute($value)
    {
        switch ($this->status_id) {
            case '1':
                return 'default';
                break;

            case '2':
                return 'info';
                break;

            case '3':
                return 'success';
                break;

            case '4':
                return 'warning';
                break;

            case '5':
                return 'danger';
                break;
            
            default:
                return 'default';
                break;
        }
        return $this->status()->status;
    }

    public function getFormAttribute($value)
    {
        return \App\Form::find($this->form_id);
    }

    public function getFormTypeAttribute($value)
    {
        if ($this->form) {
            return $this->form->form;
        } else {
            return;
        }
    }

    public function getReferenceNumberAttribute($value)
    {
        return $this->form_critical_incident()? $this->form_critical_incident()->reference_number : '';
    }

    public function getApplicantAttribute($value)
    {
        return \App\Person::
                leftJoin('applicants', 'applicants.person_id', 'people.id')->
                leftJoin('person_household', 'person_household.person_id', 'people.id')->
                leftJoin('households', 'person_household.household_id', 'households.id')->
                leftJoin('communities', 'households.community_id', 'communities.id')->
                leftJoin('regions', 'communities.region_code', 'regions.code')->
                where('applicants.application_id', $this->id)->
                where('households.active', '1')->
                first();
    }

    public function getHouseholdAttribute($value)
    {
        // dd(\App\Household::find($this->applicant->household_id));
        if ($this->applicant->household_id) {
            return \App\Household::find($this->applicant->household_id);
        } else {
            return;
        }
    }

    public function getHouseholdPeopleAttribute($value)
    {
        return \App\PersonHousehold::where('household_id', $this->applicant->household_id)->get();
    }

    public function form_critical_incident()
    {
        return \App\FormCriticalIncident::where('application_id', $this->id)->first();
        return $this->hasOne('App\FormCriticalIncident', 'application_id', $this->id);
    }

    public function getDocumentsAttribute($value)
    {
        return \App\ApplicationDocument::where('application_id', $this->id)->get();
    }

    public function getWaterMarksAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where('file', 'LIKE', 'water_marks_%')->
                get();
    }

    public function getStructuralDamageAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where('file', 'LIKE', 'structural_damage_%')->
                get();
    }

    public function getElectricalDamageAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where('file', 'LIKE', 'electrical_damage_%')->
                get();
    }

    public function getPlumbingDamageAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where('file', 'LIKE', 'plumbing_damage_%')->
                get();
    }

    public function getSiteEvidenceAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where('file', 'LIKE', 'site_evidence_%')->
                get();
    }

    public function getLandlordDocumentsAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where(function ($query) {
                    $query->orWhere('file', 'LIKE', 'landlord_%');
                    $query->orWhere('file', 'LIKE', 'utility_bill%');
                    $query->orWhere('file', 'LIKE', 'rent%');
                })->
                get();
    }

    public function getApplicantDocumentsAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where(function ($query) {
                    $query->orWhere('file', 'LIKE', 'signature%');
                    $query->orWhere('file', 'LIKE', 'id_card_front%');
                    $query->orWhere('file', 'LIKE', 'id_card_back%');
                    $query->orWhere('file', 'LIKE', 'lost_id_police_report%');
                    $query->orWhere('file', 'LIKE', 'ebc_id_letter%');
                })->
                get();
    }

    public function getHousingReliefQuotationDocumentsAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where(function ($query) {
                    $query->where('file', 'LIKE', 'housing_relief_quotation%');
                })->
                get();
    }

    public function getSchoolSuppliesReliefQuotationDocumentsAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where(function ($query) {
                    $query->where('file', 'LIKE', 'school_supplies_relief_quotation%');
                })->
                get();
    }

    public function getFireServiceReportDocumentsAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where(function ($query) {
                    $query->orWhere('file', 'LIKE', 'fire_service_report%');
                })->
                get();
    }

    public function getRegionalCorporationFloodingReportDocumentsAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where(function ($query) {
                    $query->orWhere('file', 'LIKE', 'regional_corporation_flooding_report%');
                })->
                get();
    }

    public function getClothingReliefQuotationDocumentsAttribute($value)
    {
        return \App\ApplicationDocument::
                where('application_id', $this->id)->
                where(function ($query) {
                    $query->orWhere('file', 'LIKE', 'clothing_relief_quotation%');
                })->
                get();
    }

    public function getHistoryAttribute($value)
    {
        return \App\ApplicationStatusAudit::
                where('application_id', $this->id)->
                orderBy('id', 'desc')->
                get();
    }

    public function getWelfareOfficerReportAttribute($value)
    {
        return \App\ApplicationStatusAudit::
                where('application_id', $this->id)->
                where('status_new', 6)->
                orderBy('id', 'desc')->
                first();
    }

    public function getGrantFoodCardAttribute($value)
    {
        return \App\ApplicationGrant::
                where('application_id', $this->id)->
                where('file', 'LIKE', 'emergency_food_card_%')->
                get();
    }

    public function getGrantRentAttribute($value)
    {
        return \App\ApplicationGrant::
                where('application_id', $this->id)->
                where('file', 'LIKE', 'general_assistance_rent_%')->
                get();
    }

    public function getGrantCounsellingServicesAttribute($value)
    {
        return \App\ApplicationGrant::
                where('application_id', $this->id)->
                where('file', 'LIKE', 'counselling_services%')->
                get();
    }

    public function step($step)
    {
        switch ($step) {
            case '1':
                $log = \App\ApplicationStatusAudit::
                    where('application_id', $this->id)->
                    whereIn('status_new', [1])->
                    first();
                if ($log) {
                    return $log->created_at->format('Y-m-d');
                } else {
                    return;
                }
                break;
            
            case '2':
                $log = \App\ApplicationStatusAudit::
                    where('application_id', $this->id)->
                    whereIn('status_new', [3])->
                    first();
                if ($log) {
                    return $log->created_at->format('Y-m-d');
                } else {
                    return;
                }
                break;
            
            case '3':
                $log = \App\ApplicationStatusAudit::
                    where('application_id', $this->id)->
                    whereIn('status_new', [6])->
                    first();
                if ($log) {
                    return $log->created_at->format('Y-m-d');
                } else {
                    return;
                }
                break;
            
            case '4':
                $log = \App\ApplicationStatusAudit::
                    where('application_id', $this->id)->
                    whereIn('status_new', [9,11])->
                    first();
                if ($log) {
                    return $log->created_at->format('Y-m-d');
                } else {
                    return;
                }
                break;
            
            default:
                return;
                break;
        }
    }
	
	public function scopeSchedule($query){
        return $query->
            where('status_id', 9)->
            where('scheduled', 0)->
            orderBy('id', 'desc')->
            get();
	}
}
