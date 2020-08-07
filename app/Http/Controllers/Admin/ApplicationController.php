<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
			
			'status' => \App\Status::all(),
			'immigration_status' => [],//\App\ImmigrationStatus::all(),
			'applications' => \App\Application::all(),
			'countries' => [],//\App\Country::all(),
			'country_filter' => [],//\App\Application::countries(),
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
				if($request->travel_party) $query->whereIn('applications.travel_party', $request->travel_party);
				if($request->countries) $query->whereIn('applications.country_id', $request->countries);
				if($request->quarantine_pay) $query->whereIn('applications.quarantine_pay', $request->quarantine_pay);
				if($request->period_start) $query->whereDate('applications.created_at', '>=', $request->period_start);
				if($request->period_end) $query->whereDate('applications.created_at', '<=', $request->period_end);
			})->
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
        ];

        return view('admin.application.view', $data);
    }
}
