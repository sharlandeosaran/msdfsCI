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
			'local_boards' => \App\LocalBoard::ordered(),
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
			'local_board_filter' => \App\Household::boards(),
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
			'local_boards' => 'array',

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
			select(DB::raw('applications.*, applications.id as application_id, applicant_count.applicants, forms.*, people.*, regions.*, status.*, local_boards.*'))->
			leftJoin('person_household', 'person_household.person_id', 'people.id')->
			leftJoin('households', 'households.id', 'person_household.household_id')->
			leftJoin('communities', 'communities.id', 'households.community_id')->
			leftJoin('regions', 'regions.code', 'communities.region_code')->
			leftJoin('local_boards', 'regions.letter', 'local_boards.letter')->
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
				if($request->local_boards) $query->whereIn('local_boards.letter', $request->local_boards);

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
        // return response()->json(['msg' => $request->all()], 400);

        $validator = Validator::make($request->all(), 
        [
            "id" => "required|exists:applications,id",
            "status" => "required|exists:status,id",
			"details" => "required|max:1000",
        ],
        [
            
        ]
        );
        
        $validator->after(function($validator)  use ($request) {
            
            $application = \App\Application::find($request->id);
            if (!in_array($application->local_board_letter, \Auth::user()->local_board_array())) {
                $validator->errors()->add('board', 'Cannot update applications not in your local board.');
            }
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
        $log->user_name = \Auth::user()->name;
        $log->user_role = \Auth::user()->role->role;
        $log->save();

        // if application approval revoked
        if ($request->status == 8 && $old > $request->status) {

            // rollback approvals if done
            if ($application->form_critical_incident() && $application->form_critical_incident()->items_lost) {
                foreach ($application->form_critical_incident()->items_lost as $item) {
                    $recommended = \App\FormCIItemsLost::
                        where('item_id', $item->id)->
                        where('form_critical_incident_id', $item->form_critical_incident_id)->
                        first();
                    if ($recommended) {
                        $recommended->approved = 0;
                        $recommended->cost = null;
                        $recommended->save();
                    }
                }
            }

            // rollback household approvals
            if ($application->household_people) {
                foreach ($application->household_people as $person) {
                    $household = \App\PersonHousehold::
                        where('person_id', $person->person_id)->
                        where('household_id', $person->household_id)->
                        first();
                    $household->confirm = 0;
                    $household->save();
                }
            }

            // rollback grants
            DB::delete('delete from application_grants where application_id = ?', [$application->id]);
        }

        // send emails
        // dispatch(new \App\Jobs\SubmissionEmail($user->id));
        
        return response()->json(['msg' => 'Submission sent successfully.'], 200);
    }

    public function updatestatusimages(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), 
        [
            "id" => "required|exists:applications,id",
            "status" => "required|exists:status,id",
			"details" => "required|max:1000",
            'site_evidence' => "nullable|array",
            'site_evidence.*' => "max:10000|mimes:jpg,jpeg,png",
        ],
        [
            
        ]
        );
        
        $validator->after(function($validator)  use ($request) {
            
            $application = \App\Application::find($request->id);
            if (!in_array($application->local_board_letter, \Auth::user()->local_board_array())) {
                $validator->errors()->add('board', 'Cannot update applications not in your local board.');
            }
		});

        if ($validator->fails()) {
            $uploads = app('App\Http\Controllers\FileController')->store($request);

            if ($uploads && $uploads['response'] && $request->tempfiles) {
                $old = (array) json_decode($request->tempfiles);
                $new = (array) json_decode($uploads['list']);
                $merge = array_merge($old,$new);

                return redirect('/admin/applications/view/'.$request->id)
                ->withInput()
                ->withErrors($validator)
                ->with('tempfiles', json_encode($merge))
                ;
            } elseif ($uploads && $uploads['response']) {
                return redirect('/admin/applications/view/'.$request->id)
                ->withInput()
                ->withErrors($validator)
                ->with('tempfiles', $uploads['list'])
                ;
            } elseif ($request->tempfiles) {
                return redirect('/admin/applications/view/'.$request->id)
                ->withInput()
                ->withErrors($validator)
                ->with('tempfiles', $request->tempfiles)
                ;
            } else {
                return redirect('/admin/applications/view/'.$request->id)
                ->withInput()
                ->withErrors($validator)
                ;
            }
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
        $log->user_name = \Auth::user()->name;
        $log->user_role = \Auth::user()->role->role;
		$log->save();
		
		// upload images
        // accepted file types
        $images = ['image/png', 'image/jpg', 'image/jpeg'];
        
        // site_evidence
        if ($request->file('site_evidence') !== null) {
            foreach ($request->file('site_evidence') as $i => $other) {
                if ($request->file('site_evidence'.'.'.$i) !== null) {
                    if ($request->file('site_evidence'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('site_evidence.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $images)) {
                            $document = $application->id.'_site_evidence_'.$i.'_'.$request->file('site_evidence'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('site_evidence'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/site_evidence', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'site_evidence_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
							$file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }

        // send emails
		// dispatch(new \App\Jobs\SubmissionEmail($user->id));
		
        return redirect('/admin/applications/view/'.$request->id)->with('success', 'Submission sent successfully.');
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
			select(DB::raw('applications.*, applications.id as application_id, applicant_count.applicants, forms.*, people.*, regions.*, status.*, local_boards.*'))->
			leftJoin('person_household', 'person_household.person_id', 'people.id')->
			leftJoin('households', 'households.id', 'person_household.household_id')->
			leftJoin('communities', 'communities.id', 'households.community_id')->
			leftJoin('regions', 'regions.code', 'communities.region_code')->
			leftJoin('local_boards', 'regions.letter', 'local_boards.letter')->
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
