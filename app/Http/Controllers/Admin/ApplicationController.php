<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Http\Requests;
use DB;
use Validator;

class ApplicationController extends Controller
{

	public function application()
	{

		// get users
		$users = \App\User::all();
		// $statuses = \App\AssignmentStatus::orderedSuper();
		
		$data = array(
			'title' => 'Application Filter',
			'active' => 'applicationfilter',
			'applications' => \App\Application::all(),
			
			'forms' => \App\Form::all(),
			'status' => \App\Status::all(),
			'communities' => \App\Community::ordered(),
			'regions' => \App\Region::ordered(),
			'id_states' => \App\IDState::all(),
			'insurers' => \App\Insurer::all(),
			'items' => \App\ItemsLostOrDamaged::ordered(),
			'relationships' => \App\Relationship::all(),
			'incomes' => \App\TotalIncome::ordered(),
			'disasters' => \App\Disaster::all(),
			'employments' => \App\EmploymentStatus::all(),
			'housing_types' => \App\HousingType::all(),
			'marital_status' => \App\MaritalStatus::all(),

			'households' => \App\Household::all(),
			'community_filter' => \App\Household::communities(),
			'region_filter' => \App\Household::regions(),
			'item_filter' => \App\FormCIItemsLost::items(),
		);
		
		return view('admin.application.filter', $data);
	}

	public function applicationfilter(Request $request)
	{
        // return response()->json(['msg' => $request->all()], 400);
        // return response()->json(['msg' => \App\Application::all()], 200);
		
		$validator = Validator::make($request->all(), [
			'forms' => 'array',
			'status' => 'array',

			'disasters' => 'array',
			'housing_damages' => 'array',

			'items' => 'array',

			'marital_status' => 'array',
			'id_states' => 'array',
			'employments' => 'array',

			'relationships' => 'array',

			'communities' => 'array',
			'housing_types' => 'array',
			'incomes' => 'array',

			'regions' => 'array',

			'insurers' => 'array',

			'period_start' => 'nullable|date_format:Y-m-d',
			'period_end' => 'nullable|date_format:Y-m-d',
		]);
	
		if ($validator->fails()) {
            $msg = 'Filter failed.';
            foreach ($validator->errors()->all() as $key => $value) {
                $msg .= '<br>- '.$value;
            }
            return response()->json(['msg' => $msg, 'errors' => $validator->errors()], 412);
		}


		$data = \App\Person::
			select(DB::raw('applications.*, applications.id as application_id, applicant_count.applicants, forms.*, people.*, regions.*, status.*'))->
			leftJoin('person_household', 'person_household.person_id', 'people.id')->
			leftJoin('households', 'households.id', 'person_household.household_id')->
			leftJoin('communities', 'communities.id', 'households.community_id')->
			leftJoin('regions', 'regions.code', 'communities.region_code')->
			leftJoin('applicants', 'applicants.person_id', 'people.id')->
			leftJoin('applications', 'applications.id', 'applicants.application_id')->
			leftJoin('form_critical_incident', 'form_critical_incident.application_id', 'applications.id')->
			leftJoin('form_ci_items_lost', 'form_ci_items_lost.form_critical_incident_id', 'form_critical_incident.id')->
			leftJoin('forms', 'forms.id', 'applications.form_id')->
			leftJoin('status', 'status.id', 'applications.status_id')->
			leftJoin(DB::raw( '(
					SELECT count(p.id) as applicants, ph.household_id
					FROM people p
					LEFT JOIN applicants a
					ON a.application_id = p.id
					LEFT JOIN person_household ph
					ON ph.person_id = p.id
					LEFT JOIN households h
					ON ph.household_id = h.id
					WHERE h.active = 1
					GROUP BY ph.household_id
				) applicant_count'), function ($join) {
				$join->on( 'person_household.household_id', '=', 'applicant_count.household_id');
			})->
			where(function ($query) use ($request){
				if($request->forms) $query->whereIn('applications.form_id', $request->forms);
				if($request->status) $query->whereIn('applications.status_id', $request->status);

				if($request->disasters) $query->whereIn('form_critical_incident.disaster_id', $request->disasters);
				if($request->housing_damages) $query->whereIn('form_critical_incident.housing_damage', $request->housing_damages);

				if($request->items) $query->whereIn('form_ci_items_lost.item_id', $request->items);

				if($request->marital_status) $query->whereIn('people.marital_status_id', $request->marital_status);
				if($request->id_states) $query->whereIn('people.national_id_state_id', $request->id_states);
				if($request->employments) $query->whereIn('people.employment_status_id', $request->employments);

				if($request->relationships) $query->whereIn('person_household.relationship_id', $request->relationships);

				if($request->communities) $query->whereIn('households.community_id', $request->communities);
				if($request->housing_types) $query->whereIn('households.housing_type_id', $request->housing_types);
				if($request->incomes) $query->whereIn('households.total_income_id', $request->incomes);

				if($request->regions) $query->whereIn('regions.id', $request->regions);

				// if($request->insurers) $query->whereIn('applications.insurers', $request->insurers);

				if($request->period_start) $query->whereDate('applications.created_at', '>=', $request->period_start);
				if($request->period_end) $query->whereDate('applications.created_at', '<=', $request->period_end);
			})->
			whereNotNull('applicants.person_id')->
			distinct('applications.id')->
			get();
	
		return response()->json(['data' => $data], 200);
	}
    
    public function view($id)
    {
		$application = \App\Application::find($id);
        if(!$application) return back()->with('flashed', 'That does not exist');
        
        $data = [
            'title' => 'Application View',
            'application' => $application,
			'status' => \App\Status::all(),
        ];

        return view('admin.application.view', $data);
    }

    public function updatestatus(Request $request)
    {
        // dd($request->all());
        // return response()->json(['msg' => $request->all()], 400);

        $validator = Validator::make($request->all(), 
        [
            "id" => "required|exists:applications,id",
            "status" => "required|exists:status,id",
			"details" => "required|max:1000",
			"reference_number" => [
				"nullable",
				"unique:form_critical_incident,reference_number",
                "max:150",
                Rule::requiredIf($request->status == 1),
            ],
        ],
        [
            
        ]
        );
        
        $validator->after(function($validator)  use ($request) {
            
            // if ($feedback && $request->status == 3 && ($feedback->assignment() && !(in_array($feedback->status_id, [2]) && $feedback->assignment()->assignee == \Auth::user()->id))) {
            //     $validator->errors()->add('status', 'The submission cannot be completed.');
            // }
            
            // if ($feedback && $request->status == 4 && $feedback->assignment() && !((!in_array($feedback->status_id, [3,4,5]) && !$feedback->assignment()) || ($feedback->assignment() && ($feedback->assignment()->assignee == \Auth::user()->id || $feedback->assignment()->assigned_by == \Auth::user()->id)))) {
            //     $validator->errors()->add('status', 'The submission cannot be put on hold.');
            // }
            
            // if ($feedback && $request->status == 5 && $feedback->assignment() && !((!in_array($feedback->status_id, [3,5]) && !$feedback->assignment()) || ($feedback->assignment() && ($feedback->assignment()->assignee == \Auth::user()->id || $feedback->assignment()->assigned_by == \Auth::user()->id) && !in_array($feedback->status_id, [3,5])))) {
            //     $validator->errors()->add('status', 'The submission cannot be put on hold.');
            // }
		});

        if ($validator->fails()) {
            $msg = 'Process failed.';
            foreach ($validator->errors()->all() as $key => $value) {
                $msg .= '<br>- '.$value;
            }
            return response()->json(['msg' => $msg, 'errors' => $validator->errors()], 412);
        }

        // update feedback
        $application = \App\Application::find($request->id);
        $old = $application->status_id;

        $application->status_id = $request->status;
        $application->save();

        // log update
        $log = new \App\ApplicationStatusAudit();
        $log->application_id = $request->id;
        $log->changed_by = \Auth::user()->id;
        $log->status_old = $old;
        $log->status_new = $request->status;
        $log->details = $request->details;
        $log->save();

		// log reference number
		if ($request->status == 1) {
			$log = \App\FormCriticalIncident::where('application_id', $request->id)->first();
			$log->reference_number = $request->reference_number;
			$log->save();
		}

        // send emails
        // dispatch(new \App\Jobs\SubmissionEmail($user->id));
        
        return response()->json(['msg' => 'Success'], 200);
    }

	public function updatedrow(Request $request)
	{
        // return response()->json(['msg' => $request->all()], 400);
        // return response()->json(['msg' => \App\Application::all()], 200);
		
		$validator = Validator::make($request->all(), [
			'id' => 'required|exists:applications,id',
		]);
	
		if ($validator->fails()) {
            $msg = 'Filter failed.';
            foreach ($validator->errors()->all() as $key => $value) {
                $msg .= '<br>- '.$value;
            }
            return response()->json(['msg' => $msg, 'errors' => $validator->errors()], 412);
		}


		$data = \App\Person::
			select(DB::raw('applications.*, applications.id as application_id, applicant_count.applicants, forms.*, people.*, regions.*, status.*'))->
			leftJoin('person_household', 'person_household.person_id', 'people.id')->
			leftJoin('households', 'households.id', 'person_household.household_id')->
			leftJoin('communities', 'communities.id', 'households.community_id')->
			leftJoin('regions', 'regions.code', 'communities.region_code')->
			leftJoin('applicants', 'applicants.person_id', 'people.id')->
			leftJoin('applications', 'applications.id', 'applicants.application_id')->
			leftJoin('form_critical_incident', 'form_critical_incident.application_id', 'applications.id')->
			leftJoin('form_ci_items_lost', 'form_ci_items_lost.form_critical_incident_id', 'form_critical_incident.id')->
			leftJoin('forms', 'forms.id', 'applications.form_id')->
			leftJoin('status', 'status.id', 'applications.status_id')->
			leftJoin(DB::raw( '(
					SELECT count(p.id) as applicants, ph.household_id
					FROM people p
					LEFT JOIN applicants a
					ON a.application_id = p.id
					LEFT JOIN person_household ph
					ON ph.person_id = p.id
					LEFT JOIN households h
					ON ph.household_id = h.id
					WHERE h.active = 1
					GROUP BY ph.household_id
				) applicant_count'), function ($join) {
				$join->on( 'person_household.household_id', '=', 'applicant_count.household_id');
			})->
			where('applications.id', $request->id)->
			whereNotNull('applicants.person_id')->
			distinct('applications.id')->
			get();
	
		return response()->json(['data' => $data], 200);
	}
}
