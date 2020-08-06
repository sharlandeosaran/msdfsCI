<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use Validator;

class ApplicantController extends Controller
{

	public function applicant()
	{

		// get users
		$users = \App\User::all();
		// $statuses = \App\AssignmentStatus::orderedSuper();
		
		$data = array(
			'title' => 'Applicant Filter',
			'active' => 'applicantfilter',
			
			'status' => \App\Status::all(),
			'applicants' => \App\Applicant::all(),
			'immigration_status' => \App\ImmigrationStatus::all(),
			'covid_status' => \App\CovidStatus::all(),
			'countries' => \App\Country::all(),
			'country_filter' => \App\Application::countries(),
		);
	
		return view('admin.applicant.filter', $data);
	}

	public function applicantfilter(Request $request)
	{
        // return response()->json(['msg' => $request->all()], 400);
		
		$validator = Validator::make($request->all(), [
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

		$data = \App\Applicant::
			select(DB::raw('CONCAT(applicants.first_name, " ", applicants.surname) as name, applicants.*, applications.status_id as status, applications.exemption_type, applicants.immigration_status_id as immigration_status'))->
			leftJoin('applications', 'applications.id', '=', 'applicants.application_id')->
			where(function ($query) use ($request){
				if($request->exemption_types) $query->whereIn('applications.exemption_type', $request->exemption_types);
				if($request->travel_party) $query->whereIn('applications.travel_party', $request->travel_party);
				if($request->countries) $query->whereIn('applications.country_id', $request->countries);
				if($request->quarantine_pay) $query->whereIn('applications.quarantine_pay', $request->quarantine_pay);
				if($request->period_start) $query->whereDate('applications.created_at', '>=', $request->period_start);
				if($request->period_end) $query->whereDate('applications.created_at', '<=', $request->period_end);
				
				if($request->status) $query->whereIn('applicants.status_id', $request->status);
				if($request->immigration_status) $query->whereIn('applicants.immigration_status_id', $request->immigration_status);
				if($request->gender) $query->whereIn('applicants.gender', $request->gender);
				if($request->medical_issues) $query->whereIn('applicants.medical_issues', $request->medical_issues);
				if($request->covid_status) $query->whereIn('applicants.covid_status_id', $request->covid_status);
			})->
			get();
	
		return response()->json(['data' => $data], 200);
	}
    
    public function view($id)
    {
		$applicant = \App\Applicant::find($id);
        if(!$applicant) return back()->with('flashed', 'That does not exist');
        
        $data = [
            'title' => 'Applicant View',
            'applicant' => $applicant,
        ];

        return view('admin.applicant.view', $data);
    }
}
