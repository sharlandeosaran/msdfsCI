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
            
            "items_lost_or_damaged" => "array",
            "recovery_needs" => "array",

            "items_lost_or_damaged.*" => "nullable|exists:items_lost_or_damaged,id",            
            "recovery_needs.*" => "nullable|numeric", 

            'site_evidence' => "nullable|array",
            'site_evidence.*' => "max:10000|mimes:jpg,jpeg,png",
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

        // update feedback
        $application = \App\Application::find($request->id);
        // dd($application->form_critical_incident()->items_lost);
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
        
        if ($request->items_lost_or_damaged && $application->form_critical_incident() && $application->form_critical_incident()->items_lost) {
            foreach ($application->form_critical_incident()->items_lost as $item) {
                if (isset($request->items_lost_or_damaged[$item->slug])) {
                    if (isset($request->recovery_needs[$item->slug])) {
                        if ($request->recovery_needs[$item->slug] <= $item->max_value) {
                            $recommended = \App\FormCIItemsLost::find($item->id);
                            $recommended->approved = 1;
                            $recommended->cost = $request->recovery_needs[$item->slug];
                            $recommended->save();
                        }
                    } else {
                        $recommended = \App\FormCIItemsLost::find($item->id);
                        $recommended->recommended = 1;
                        $recommended->save();
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
