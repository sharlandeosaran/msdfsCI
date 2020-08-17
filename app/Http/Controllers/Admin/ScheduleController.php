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
        // dd($data);

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
        $ids = array_filter($explode);
        // dd($ids);

        $applications = \App\Application::whereIn('id', $ids)->get();
        // dd($applications);
        
        // initialize schedules
        $list = $this->schedulerows($applications);
        if (!$list) return redirect('/admin/schedule/new')->with('flashed', 'No schedules possible for the applications submitted.');
        // dd($list);

        $data = [
            'title' => 'Approved Grant Schedules',
			'active' => 'schedules',
            'activelink' => 'newschedule',
            'list' => $list,
        ];

        return view('admin.schedule.create', $data);
        
        // return redirect('/admin/schedule/view/'.$schedule->id)->with('success', 'Submission sent successfully.');
    }
    
    public function createschedule()
    {
        $data = [
            'title' => 'Schedules',
			'active' => 'schedules',
            'activelink' => 'newschedule',
            'application' => \App\Application::first(),
			'status' => \App\Status::all(),
        ];

        return view('admin.schedule.create', $data);
    }

    public function schedulerows($applications, $all = null)
    {
        // initialize schedules
        $list = [];

        if ($applications) {

            // loop through applications
            foreach ($applications as $key => $application) {

                // items lost
                $items_lost = [];
                if($application->form_critical_incident()->items_lost)
                    foreach ($application->form_critical_incident()->items_lost as $item) {
                        $items_lost[] = $item->id;
                    }
                
                // initiate clothing and school clothes grants
                $school = $clothing = false;

                // load rental rows
                if (
                    $application->grant_rent && 
                    isset($application->grant_rent['general_assistance_rent_value']) && 
                    isset($application->grant_rent['general_assistance_rent_period']) &&
                    (
                        $all ||
                        (!$all && !$application->scheduled(1))
                    )
                )
                {
                    $list['rental'][$key] = [
                        'ref_num' => $application->reference_number,
                        'application' => $application->id,
                        'scheduled' => $application->scheduled(1),
                        'applicant_name' => $application->applicant->name,
                        'id_card' => $application->applicant->national_id,
                        'address' => $application->household->address,
                        'item' => 'Rental for household @ '.$application->household->address,
                        'amount' => '$'.number_format($application->grant_rent['general_assistance_rent_value'],2).' for '.($application->grant_rent['general_assistance_rent_period'] == '1'? $application->grant_rent['general_assistance_rent_period'] .' month' : $application->grant_rent['general_assistance_rent_period'] .' months').' from '.$application->grant_rent['general_assistance_rent_month'],
                        'total' => '$'.number_format($application->grant_rent['general_assistance_rent_value'] * $application->grant_rent['general_assistance_rent_period'],2),
                        'landlord' => $application->household->landlord->name,
                        'contact' => $application->household->landlord->contact,
                        
                        'total_raw' => $application->grant_rent['general_assistance_rent_value'] * $application->grant_rent['general_assistance_rent_period'],
                        'period' => $application->grant_rent['general_assistance_rent_period'],
                        'value' => $application->grant_rent['general_assistance_rent_value'],
                        'start_date' => $application->grant_rent['general_assistance_rent_month'],
                    ];
                }

                // load household items rows
                if (
                    $application->form_critical_incident()->items_lost && 
                    count($application->form_critical_incident()->items_lost)
                ) 
                {
                    $items = [];
                    $total = $school_total = $clothing_total = 0;
                    foreach ($application->form_critical_incident()->items_lost as $items_lost)
                    {
                        if ($items_lost->approved)
                        {
                            if (!in_array($items_lost->id, [10,11,12])) {
                                $items[] = [
                                    'item' => $items_lost->item,
                                    'cost' => $items_lost->cost / 1.125, // less 12.5% VAT
                                ];
                                $total += $items_lost->cost;
                            } else {
                                if ($items_lost->id == 12) {
                                    $clothing = true;
                                    $clothing_total += $items_lost->cost;
                                }

                                if (in_array($items_lost->id, [10,11])) {
                                    $school = true;
                                    $school_total += $items_lost->cost;
                                }
                            }
                        }
                    }

                    if ($total > 0) {
                        if ( $all || (!$all && !$application->scheduled(2)) )
                        {
                            $list['household'][$key] = [
                                'ref_num' => $application->reference_number,
                                'application' => $application->id,
                                'scheduled' => $application->scheduled(2),
                                'applicant_name' => $application->applicant->name,
                                'id_card' => $application->applicant->national_id,
                                'address' => $application->household->address,
                                'items' => $items,
                            ];
                        }
                        
                    }
                }

                // load clothing rows
                if ($clothing) 
                {
                    if ( $all || (!$all && !$application->scheduled(3)) )
                    {              
                        $list['clothing'][$key] = [
                            'ref_num' => $application->reference_number,
                            'application' => $application->id,
                            'scheduled' => $application->scheduled(3),
                            'applicant_name' => $application->applicant->name,
                            'id_card' => $application->applicant->national_id,
                            'address' => $application->household->address,
                            'total' => $clothing_total,
                        ];
                    }
                }

                // load school rows
                if ($school) 
                {
                    if ( $all || (!$all && !$application->scheduled(4)) )
                    {
                        $list['school'][$key] = [
                            'ref_num' => $application->reference_number,
                            'application' => $application->id,
                            'scheduled' => $application->scheduled(4),
                            'applicant_name' => $application->applicant->name,
                            'id_card' => $application->applicant->national_id,
                            'address' => $application->household->address,
                            'total' => $school_total,
                        ];
                    }
                }

            }
        }

        return $list;
    }
}