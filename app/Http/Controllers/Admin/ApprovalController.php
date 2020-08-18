<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Http\Requests;
use DB;
use Validator;

class ApprovalController extends Controller
{
    
    public function approvalrequest(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), 
        [
            "id" => "required|exists:applications,id",
            "status_id" => "required|exists:status,id",
			"status" => "required",
        ]
        );
        
        $validator->after(function($validator)  use ($request) {
		});

        if ($validator->fails()) {
            return redirect('/admin/applications/view/'.$request->id)
                ->withInput()
                ->withErrors($validator)
                ;
        }

        // update feedback
        $application = \App\Application::find($request->id);
        
        $data = [
            'title' => 'Application View',
            'application' => $application,
            'status' => $request->status,
            'status_id' => $request->status_id,
        ];

        return view('admin.application.approval', $data);
    }

    public function approvalpost(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), 
        [
            "id" => "required|exists:applications,id",
            "status" => "required|exists:status,id",
            "details" => "required|max:1000",
            
            "household" => "array",
            "items_lost_or_damaged" => "array",
            "recovery_needs" => "array",

            "household.*" => "nullable|exists:people,id",            
            "items_lost_or_damaged.*" => "nullable|exists:items_lost_or_damaged,id",            
            "recovery_needs.*" => "nullable|numeric", 

            'site_evidence' => "nullable|array",
            'site_evidence.*' => "max:10000|mimes:jpg,jpeg,png",

            "grants" => "array",
            "grant_values" => "array",

            "grant_values.emergency_food_card.emergency_food_card_value" => [
                'nullable',
                'numeric',
                Rule::requiredIf(isset($request->grants['emergency_food_card']) && $request->grants['emergency_food_card'] == 'on'),
            ],
            "grant_values.emergency_food_card.emergency_food_card_period" => [
                'nullable',
                'numeric',
                Rule::requiredIf(isset($request->grants['emergency_food_card']) && $request->grants['emergency_food_card'] == 'on'),
            ],
            "grant_values.general_assistance_rent.general_assistance_rent_value" => [
                'nullable',
                'numeric',
                Rule::requiredIf(isset($request->grants['general_assistance_rent']) && $request->grants['general_assistance_rent'] == 'on'),
            ],
            "grant_values.general_assistance_rent.general_assistance_rent_period" => [
                'nullable',
                'numeric',
                Rule::requiredIf(isset($request->grants['general_assistance_rent']) && $request->grants['general_assistance_rent'] == 'on'),
            ],
            "grant_values.general_assistance_rent.general_assistance_rent_month" => [
                'nullable',
                'date_format:F Y',
                Rule::requiredIf(isset($request->grants['general_assistance_rent']) && $request->grants['general_assistance_rent'] == 'on'),
            ],
            "grant_values.counselling_services.counselling_services" => [
                'nullable',
                // '',
                Rule::requiredIf(isset($request->grants['counselling_services']) && $request->grants['counselling_services'] == 'on'),
            ],
        ],
        [
            
        ]
        );
        
        $validator->after(function($validator)  use ($request) {
		});

        if ($validator->fails()) {
            return redirect('/admin/applications/view/'.$request->id)
                ->withInput()
                ->withErrors($validator)
                ;
        }

        // update application
        $application = \App\Application::find($request->id);
        $old = $application->status_id;
        $schedules = 0;

        // count schedules if approved
        if ($request->status == 9) $schedules = count(app('App\Http\Controllers\Admin\ScheduleController')->schedulerows([$application]));

        $application->schedules_approved = $schedules > 0? $schedules : null;
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

        // update household members
        if ($request->household) {
            foreach ($application->household_people as $person) {
                if (in_array($person->person_id, $request->household)) {
                    $household = \App\PersonHousehold::
                        where('person_id', $person->person_id)->
                        where('household_id', $person->household_id)->
                        first();
                    $household->confirm = 1;
                    $household->save();
                }
            }
            
        }
        
        // update recommended items
        if ($request->items_lost_or_damaged && $application->form_critical_incident() && $application->form_critical_incident()->items_lost) {
            foreach ($application->form_critical_incident()->items_lost as $item) {
                if (isset($request->items_lost_or_damaged[$item->slug])) {
                    if (isset($request->recovery_needs[$item->slug])) {
                        // if ($request->recovery_needs[$item->slug] <= $item->max_value) {
                            $recommended = \App\FormCIItemsLost::
                                where('item_id', $item->id)->
                                where('form_critical_incident_id', $item->form_critical_incident_id)->
                                first();
                            if ($recommended) {
                                $recommended->approved = 1;
                                $recommended->cost = $request->recovery_needs[$item->slug];
                                $recommended->save();
                            }
                        // }
                    } else {
                        $recommended = \App\FormCIItemsLost::
                            where('item_id', $item->id)->
                            where('form_critical_incident_id', $item->form_critical_incident_id)->
                            first();
                        if ($recommended) {
                            $recommended->recommended = 1;
                            $recommended->save();
                        }
                        
                    }
                }
            }
        }

        // create grants
        if ($request->grants) {
            foreach ($request->grants as $grant => $on) {
                if (isset($request->grant_values[$grant]) && $on == 'on') {
                    foreach ($request->grant_values[$grant] as $key => $value) {
                        $grant = new \App\ApplicationGrant();
                        $grant->application_id = $application->id;
                        $grant->key = $key;
                        $grant->value = $value;
                        $grant->save();
                    }
                }
            }
        }
        
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
}
