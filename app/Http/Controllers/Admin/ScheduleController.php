<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ScheduleController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Schedules',
			'active' => 'schedules',
            'activelink' => 'schedules',
            'applications' => \App\Application::schedule(),
        ];

        return view('admin.schedule.schedule', $data);
    }
    
    public function view($id)
    {
		$schedule = \App\Schedule::find($id);
        if(!$schedule) return back()->with('flashed', 'That does not exist');
        
        $data = [
            'title' => 'Schedule View',
			'active' => 'schedules',
            'activelink' => 'schedules',
            'schedule' => $schedule,
        ];

        return view('admin.schedule.view', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'New Schedule',
			'active' => 'schedules',
            'activelink' => 'newschedule',
            'applications' => \App\Application::schedule(),
        ];

        return view('admin.schedule.new', $data);
    }

    public function newschedulepost(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), 
        [
            "applications" => "required",
        ]
        );
        
        if ($validator->fails()) {
            return redirect('/admin/schedule/new')
            ->withInput()
            ->withErrors($validator);
        }

        if(is_string($request->applications)){
            $bad = array("[", "]");
            $safe = array('', '');
            $request->applications = str_replace($bad,$safe,$request->applications);
        }
        $explode = explode(',', $request->applications);
        $list = array_filter($explode);
        // dd($list);

        if ($list) {
            // create schedule
            $schedule = new \App\Schedule();
            $schedule->created_by = \Auth::user()->id;
            $schedule->type_id = 1;
            $schedule->save();
            
            // store applications
            foreach ($list as $value) {

                // change status of application to scheduled
                $application = \App\Application::find($value);
                $application->status_id = 10;
                $application->scheduled = 1;
                $application->save();

                // attach applications to schedules
                $schedule_application = new \App\ScheduleApplication();
                $schedule_application->schedule_id = $schedule->id;
                $schedule_application->application_id = $value;
                $schedule_application->save();
            }
        }
        
        return redirect('/admin/schedule/view/'.$schedule->id)->with('success', 'Submission sent successfully.');
    }
}
