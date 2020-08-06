<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use Validator;

class FilterController extends Controller
{

	public function application()
	{

		// get users
		$users = \App\User::all();
		// $statuses = \App\AssignmentStatus::orderedSuper();
		
		$data = array(
			'title' => 'Application Filter',
			'active' => 'applicationfilter',
			
			'status' => \App\Status::all(),
			'immigration_status' => \App\ImmigrationStatus::all(),
			'applications' => \App\Application::all(),
			'countries' => \App\Country::all(),
			// 'exempt_types' ; \App\Example
			'string' => '',
			'data' => '',
			'categories' => [],	//\App\Category::all(),
			'priorities' => [],	//\App\Priority::all(),
			'criteria' => [],	//\App\PriorityCriteria::all(),
			'requesters' => [],	//\App\Requester::ordered(),
			'agencies' => [],	//\App\MinistryAgency::ordered(),
			'resource_list' => [],	//\App\User::where('active','1')->where('assignment','1')->orderedByFirstName(),
			'button' => 1
		);
	
		return view('admin.application.filter', $data);
	}

	public function applicationfilter(Request $request)
	{
        // return response()->json(['msg' => $request->all()], 400);
        // return response()->json(['msg' => \App\Application::all()], 200);
		
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

		$data = \App\Application::
			select('applications.*', 'applicants.*')->
			leftJoin(DB::raw( '(
					SELECT count(*) as applicants, application_id
					FROM applicants
					GROUP BY application_id
				) applicants'), function ($join) {
				$join->on( 'applications.id', '=', 'applicants.application_id');
			})->
			where(function ($query) use ($request){
				if($request->exemption_types) $query->whereIn('applications.exemption_type', $request->exemption_types);
				if($request->countries) $query->whereIn('applications.country_id', $request->countries);
				if($request->quarantine_pay) $query->whereIn('applications.quarantine_pay', $request->quarantine_pay);
				if($request->period_start) $query->whereDate('applications.created_at', '>=', $request->period_start);
				if($request->period_end) $query->whereDate('applications.created_at', '<=', $request->period_end);
			})->
			get();
	
		return response()->json(['data' => $data], 200);
	}

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
			// 'exempt_types' ; \App\Example
			'string' => '',
			'data' => '',
			'categories' => [],	//\App\Category::all(),
			'priorities' => [],	//\App\Priority::all(),
			'criteria' => [],	//\App\PriorityCriteria::all(),
			'requesters' => [],	//\App\Requester::ordered(),
			'agencies' => [],	//\App\MinistryAgency::ordered(),
			'resource_list' => [],	//\App\User::where('active','1')->where('assignment','1')->orderedByFirstName(),
			'button' => 1
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
	
	public function search(Request $request)
	{
		// if search string empty return to previous page
		if(!$request->input('string')) return back()->with('flashed', 'Search string empty');
		
		$validator = Validator::make($request->all(), [
			'string' => 'max:255',
		]);
	
		if ($validator->fails()) {
			return back()
				->withInput()
				->withErrors($validator);
		}
		$string = strtolower($request->string);
		$split = preg_split( "/(&amp;|&lt;|&gt;|\/|\?|\*|,|#|-|\.|\||\s)+/", $string);
		/*$split['string'] = $request->input('string');
		dd($split);//*/
		
		// Get results from database
		$feedback = [];
		foreach ($split as $str) {
			
			$getfeedback = \App\Feedback::all();
			foreach ($getfeedback as $row) {
				if (
					strpos(strtolower($row->name), $str) !== false ||
					strpos(strtolower($row->email), $str) !== false ||
					strpos(strtolower($row->phone), $str) !== false ||
					strpos(strtolower($row->organization), $str) !== false ||
					strpos(strtolower($row->category), $str) !== false ||
					strpos(strtolower($row->assignee), $str) !== false ||
					strpos(strtolower($row->submission_type), $str) !== false ||
					strpos(strtolower($row->status), $str) !== false ||
					strpos(strtolower($row->other_field), $str) !== false
				) $feedback[] = $row->id;

				foreach ($row->subcategories() as $key => $value) {
					if (strpos($value, $str) !== false) $feedback[] = $row->id;
				}
			}

			$getsubmissions = \App\FeedbackSubmission::all();
			foreach ($getsubmissions as $row) {
				if (
					strpos(strtolower($row->subject), $str) !== false ||
					strpos(strtolower(json_encode($row->tags)), $str) !== false ||
					strpos(strtolower($row->comments), $str) !== false
				) $feedback[] = $row->feedback_id;
			}
			// dd($feedback);				
		}
		
		$data = array(
			'title' => 'Search: '.$string,
			'string' => $string,
			'feedback' => \App\Feedback::whereIn('id', $feedback)->whereIn('category', \Auth::user()->category_id())->get(),
		);
	
        return view('admin.reports.feedback.table', $data);
	}
}
