<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Http\Requests;
use DB;
use Carbon\Carbon;
use Validator;

class SchedulePostController extends Controller
{

    public function clothingschedulepost(Request $request)
    {
        // return response()->json(['msg' => $request->all()], 400);

        $validator = Validator::make($request->all(), 
        [
            "clothing_application" => "required|array",
            "clothing_contact" => "required|array",
            "clothing_invoice" => "required|array",
            "clothing_supplier" => "required|array",
            "clothing_items" => "required|array",
            "clothing_costs" => "required|array",
            
            "clothing_application.*" => "required|exists:applications,id",
			"clothing_contact.*" => "required|max:150",
			"clothing_invoice.*" => "required|max:150",
            "clothing_supplier.*" => "required|max:150",
            "clothing_items.*" => "required|array",
            "clothing_costs.*" => "required|array",
            
			"clothing_items.*.*" => "required|max:150",
			"clothing_costs.*.*" => "required|numeric",
        ],
        [
            "clothing_application.*.required" => "The clothing application field is required.",
            "clothing_invoice.*.required" => "The clothing invoice field is required.",
            "clothing_supplier.*.required" => "The clothing supplier field is required.",
            "clothing_contact.*.required" => "The clothing contact field is required.",
        ]
        );
        
        $validator->after(function($validator)  use ($request) {
            
            // check if applications already scheduled
            $applications = \App\Application::whereIn('id', $request->clothing_application)->get();
            $scheduled = true;
            foreach ($applications as $application) {
                if (!$application->scheduled(3)) $scheduled = false;
            }
            if ($scheduled) $validator->errors()->add('clothing', 'All clothing applications submitted are already scheduled.');
		});

        if ($validator->fails()) {
            $msg = 'Process failed.';
            foreach ($validator->errors()->all() as $key => $value) {
                $msg .= '<br>- '.$value;
            }
            return response()->json(['msg' => $msg, 'errors' => $validator->errors()], 412);
        }
        // return response()->json(['msg' => 'passed'], 400);

        // create schedule
        $schedule = new \App\Schedule();
        $schedule->created_by = \Auth::user()->id;
        $schedule->type_id = 3;
        $schedule->save();

        // store applications
        foreach ($request->clothing_application as $key => $value) {
            
            // change status of application to scheduled
            $application = \App\Application::find($value);
            $application->status_id = 10;
            $application->save();
            // return response()->json(['msg' => $application], 400);

            // get schedule row
            $row = app('App\Http\Controllers\Admin\ScheduleController')->schedulerows([$application]);

            if ($row && isset($row['clothing']) && $row['clothing'][0]) {
                // return response()->json(['msg' => $row['clothing'][0]], 400);

                $total= 0;

                // calculate item total and VAT
                $items = $costs = $quantity = [];
                foreach ($request->clothing_items as $i => $item) {
                    if ($item['key'] == $key) {
                        $items[] = $item;
                        $costs[] = $request->clothing_costs[$i];
                        $quantity[] = $request->clothing_quantity[$i];
                        $total += $request->clothing_costs[$i]['value'];
                    }
                }

                // attach applications to schedules
                $schedule_application = new \App\ScheduleApplication();
                $schedule_application->schedule_id = $schedule->id;
                $schedule_application->application_id = $value;
                $schedule_application->number = $key + 1;
                $schedule_application->reference_number = $row['clothing'][0]['ref_num'];
                $schedule_application->applicant_name = $row['clothing'][0]['applicant_name'];
                $schedule_application->id_card = $row['clothing'][0]['id_card'];
                $schedule_application->address = $row['clothing'][0]['address'];
                $schedule_application->vat = $total * 0.125;
                $schedule_application->total = $total;
                $schedule_application->supplier = $request->clothing_supplier[$key];
                $schedule_application->invoice = $request->clothing_invoice[$key];
                $schedule_application->contact = $request->clothing_contact[$key];
                $schedule_application->save();

                // return response()->json(['msg' => $request->clothing_items, 'key' => $key], 400);
                // return response()->json(['items' => $items, 'costs' => $costs], 400);

                // attach items to schedules
                foreach ($items as $i => $item) {
                    $schedule_item = new \App\ScheduleItem();
                    $schedule_item->schedule_application_id = $schedule_application->id;
                    $schedule_item->quantity = $quantity[$i]['value'];
                    $schedule_item->item = $item['value'];
                    $schedule_item->cost = $costs[$i]['value'];
                    $schedule_item->save();
                }
                
            }
            
        }

        // send emails
        // dispatch(new \App\Jobs\SubmissionEmail($user->id));
        
        return response()->json(['msg' => 'Clothing Schedule successfully created.'], 200);
    }

    public function schoolschedulepost(Request $request)
    {
        // return response()->json(['msg' => $request->all()], 400);

        $validator = Validator::make($request->all(), 
        [
            "school_application" => "required|array",
            "school_contact" => "required|array",
            "school_invoice" => "required|array",
            "school_supplier" => "required|array",
            "school_items" => "required|array",
            "school_costs" => "required|array",
            
            "school_application.*" => "required|exists:applications,id",
			"school_contact.*" => "required|max:150",
			"school_invoice.*" => "required|max:150",
            "school_supplier.*" => "required|max:150",
            "school_items.*" => "required|array",
            "school_costs.*" => "required|array",
            
			"school_items.*.*" => "required|max:150",
			"school_costs.*.*" => "required|numeric",
        ],
        [
            "school_application.*.required" => "The school application field is required.",
            "school_invoice.*.required" => "The school invoice field is required.",
            "school_supplier.*.required" => "The school supplier field is required.",
            "school_contact.*.required" => "The school contact field is required.",
        ]
        );
        
        $validator->after(function($validator)  use ($request) {
            
            // check if applications already scheduled
            $applications = \App\Application::whereIn('id', $request->school_application)->get();
            $scheduled = true;
            foreach ($applications as $application) {
                if (!$application->scheduled(4)) $scheduled = false;
            }
            if ($scheduled) $validator->errors()->add('school', 'All school applications submitted are already scheduled.');
		});

        if ($validator->fails()) {
            $msg = 'Process failed.';
            foreach ($validator->errors()->all() as $key => $value) {
                $msg .= '<br>- '.$value;
            }
            return response()->json(['msg' => $msg, 'errors' => $validator->errors()], 412);
        }
        // return response()->json(['msg' => 'passed'], 400);

        // create schedule
        $schedule = new \App\Schedule();
        $schedule->created_by = \Auth::user()->id;
        $schedule->type_id = 4;
        $schedule->save();

        // store applications
        foreach ($request->school_application as $key => $value) {
            
            // change status of application to scheduled
            $application = \App\Application::find($value);
            $application->status_id = 10;
            $application->save();
            // return response()->json(['msg' => $application], 400);

            // get schedule row
            $row = app('App\Http\Controllers\Admin\ScheduleController')->schedulerows([$application]);

            if ($row && isset($row['school']) && $row['school'][0]) {
                // return response()->json(['msg' => $row['school'][0]], 400);

                $total= 0;

                // calculate item total and VAT
                $items = $costs = $quantity = [];
                foreach ($request->school_items as $i => $item) {
                    if ($item['key'] == $key) {
                        $items[] = $item;
                        $costs[] = $request->school_costs[$i];
                        $quantity[] = $request->school_quantity[$i];
                        $total += $request->school_costs[$i]['value'];
                    }
                }

                // attach applications to schedules
                $schedule_application = new \App\ScheduleApplication();
                $schedule_application->schedule_id = $schedule->id;
                $schedule_application->application_id = $value;
                $schedule_application->number = $key + 1;
                $schedule_application->reference_number = $row['school'][0]['ref_num'];
                $schedule_application->applicant_name = $row['school'][0]['applicant_name'];
                $schedule_application->id_card = $row['school'][0]['id_card'];
                $schedule_application->address = $row['school'][0]['address'];
                $schedule_application->vat = $total * 0.125;
                $schedule_application->total = $total;
                $schedule_application->supplier = $request->school_supplier[$key];
                $schedule_application->invoice = $request->school_invoice[$key];
                $schedule_application->contact = $request->school_contact[$key];
                $schedule_application->save();

                // return response()->json(['msg' => $request->school_items, 'key' => $key], 400);
                // return response()->json(['items' => $items, 'costs' => $costs], 400);

                // attach items to schedules
                foreach ($items as $i => $item) {
                    $schedule_item = new \App\ScheduleItem();
                    $schedule_item->schedule_application_id = $schedule_application->id;
                    $schedule_item->quantity = $quantity[$i]['value'];
                    $schedule_item->item = $item['value'];
                    $schedule_item->cost = $costs[$i]['value'];
                    $schedule_item->save();
                }
                
            }
            
        }

        // send emails
        // dispatch(new \App\Jobs\SubmissionEmail($user->id));
        
        return response()->json(['msg' => 'School Supplies Schedule successfully created.'], 200);
    }

    public function householdschedulepost(Request $request)
    {
        // return response()->json(['msg' => $request->all()], 400);

        $validator = Validator::make($request->all(), 
        [
            "household_application" => "required|array",
            "household_contact" => "required|array",
            "household_invoice" => "required|array",
            "household_supplier" => "required|array",
            "household_items" => "required|array",
            "household_costs" => "required|array",
            
            "household_application.*" => "required|exists:applications,id",
			"household_contact.*" => "required|max:150",
			"household_invoice.*" => "required|max:150",
            "household_supplier.*" => "required|max:150",
            "household_items.*" => "required|array",
            "household_costs.*" => "required|array",
            
			"household_items.*.*" => "required|max:150",
			"household_costs.*.*" => "required|numeric",
        ],
        [
            "household_application.*.required" => "The household application field is required.",
            "household_invoice.*.required" => "The household invoice field is required.",
            "household_supplier.*.required" => "The household supplier field is required.",
            "household_contact.*.required" => "The household contact field is required.",
        ]
        );
        
        $validator->after(function($validator)  use ($request) {
            
            // check if applications already scheduled
            $applications = \App\Application::whereIn('id', $request->household_application)->get();
            $scheduled = true;
            foreach ($applications as $application) {
                if (!$application->scheduled(2)) $scheduled = false;
            }
            if ($scheduled) $validator->errors()->add('household', 'All household applications submitted are already scheduled.');
		});

        if ($validator->fails()) {
            $msg = 'Process failed.';
            foreach ($validator->errors()->all() as $key => $value) {
                $msg .= '<br>- '.$value;
            }
            return response()->json(['msg' => $msg, 'errors' => $validator->errors()], 412);
        }
        // return response()->json(['msg' => 'passed'], 400);

        // create schedule
        $schedule = new \App\Schedule();
        $schedule->created_by = \Auth::user()->id;
        $schedule->type_id = 2;
        $schedule->save();

        // store applications
        foreach ($request->household_application as $key => $value) {
            
            // change status of application to scheduled
            $application = \App\Application::find($value);
            $application->status_id = 10;
            $application->save();
            // return response()->json(['msg' => $application], 400);

            // get schedule row
            $row = app('App\Http\Controllers\Admin\ScheduleController')->schedulerows([$application]);

            if ($row && isset($row['household']) && $row['household'][0]) {
                // return response()->json(['msg' => $row['household'][0]], 400);

                $total= 0;

                // calculate item total and VAT
                $items = $costs = [];
                foreach ($request->household_items as $i => $item) {
                    if ($item['key'] == $key) {
                        $items[] = $item;
                        $costs[] = $request->household_costs[$i];
                        $total += $request->household_costs[$i]['value'];
                    }
                }

                // attach applications to schedules
                $schedule_application = new \App\ScheduleApplication();
                $schedule_application->schedule_id = $schedule->id;
                $schedule_application->application_id = $value;
                $schedule_application->number = $key + 1;
                $schedule_application->reference_number = $row['household'][0]['ref_num'];
                $schedule_application->applicant_name = $row['household'][0]['applicant_name'];
                $schedule_application->id_card = $row['household'][0]['id_card'];
                $schedule_application->address = $row['household'][0]['address'];
                $schedule_application->vat = $total * 0.125;
                $schedule_application->total = $total;
                $schedule_application->supplier = $request->household_supplier[$key];
                $schedule_application->invoice = $request->household_invoice[$key];
                $schedule_application->contact = $request->household_contact[$key];
                $schedule_application->save();

                // return response()->json(['msg' => $request->household_items, 'key' => $key], 400);
                // return response()->json(['items' => $items, 'costs' => $costs], 400);

                // attach items to schedules
                foreach ($items as $i => $item) {
                    $schedule_item = new \App\ScheduleItem();
                    $schedule_item->schedule_application_id = $schedule_application->id;
                    $schedule_item->quantity = 1;
                    $schedule_item->item = $item['value'];
                    $schedule_item->cost = $costs[$i]['value'];
                    $schedule_item->save();
                }
                
            }
            
        }

        // send emails
        // dispatch(new \App\Jobs\SubmissionEmail($user->id));
        
        return response()->json(['msg' => 'Household Items Schedule successfully created.'], 200);
    }

    public function rentalschedulepost(Request $request)
    {
        // return response()->json(['msg' => $request->all()], 400);

        $validator = Validator::make($request->all(), 
        [
            "rental_application" => "required|array",
            "rental_invoice" => "required|array",
            
            "rental_application.*" => "required|exists:applications,id",
			"rental_invoice.*" => "required|max:150",
        ],
        [
            "rental_application.*.required" => "The rental application field is required.",
            "rental_invoice.*.required" => "The rental invoice field is required.",
        ]
        );
        
        $validator->after(function($validator)  use ($request) {
            
            // check if applications already scheduled
            $applications = \App\Application::whereIn('id', $request->rental_application)->get();
            $scheduled = true;
            foreach ($applications as $application) {
                if (!$application->scheduled(1)) $scheduled = false;
            }
            if ($scheduled) $validator->errors()->add('rental', 'All rental applications submitted are already scheduled.');
		});

        if ($validator->fails()) {
            $msg = 'Process failed.';
            foreach ($validator->errors()->all() as $key => $value) {
                $msg .= '<br>- '.$value;
            }
            return response()->json(['msg' => $msg, 'errors' => $validator->errors()], 412);
        }
        // return response()->json(['msg' => 'passed'], 200);

        // create schedule
        $schedule = new \App\Schedule();
        $schedule->created_by = \Auth::user()->id;
        $schedule->type_id = 1;
        $schedule->save();

        // store applications
        foreach ($request->rental_application as $key => $value) {
            
            // change status of application to scheduled
            $application = \App\Application::find($value);
            $application->status_id = 10;
            $application->save();
            // return response()->json(['msg' => $application], 400);

            // get schedule row
            $row = app('App\Http\Controllers\Admin\ScheduleController')->schedulerows([$application]);

            if ($row && isset($row['rental']) && $row['rental'][0]) {
                // return response()->json(['msg' => $row['rental'][0]], 400);

                // attach applications to schedules
                $schedule_application = new \App\ScheduleApplication();
                $schedule_application->schedule_id = $schedule->id;
                $schedule_application->application_id = $value;
                $schedule_application->number = $key + 1;
                $schedule_application->reference_number = $row['rental'][0]['ref_num'];
                $schedule_application->applicant_name = $row['rental'][0]['applicant_name'];
                $schedule_application->id_card = $row['rental'][0]['id_card'];
                $schedule_application->address = $row['rental'][0]['address'];
                $schedule_application->vat = 0;
                $schedule_application->total = $row['rental'][0]['total_raw'];
                $schedule_application->supplier = null;
                $schedule_application->invoice = $request->rental_invoice[$key];
                $schedule_application->contact = $row['rental'][0]['contact'];
                $schedule_application->save();

                // attach rent to schedules
                $schedule_rent = new \App\ScheduleRent();
                $schedule_rent->schedule_application_id = $schedule_application->id;
                $schedule_rent->landlord = $row['rental'][0]['landlord'];
                $schedule_rent->item = $row['rental'][0]['item'];
                $schedule_rent->quantity = $row['rental'][0]['period'];
                $schedule_rent->amount = $row['rental'][0]['value'];
                $schedule_rent->start_date = Carbon::parse($row['rental'][0]['start_date'])->format('Y-m-d');
                $schedule_rent->save();
            }
            
        }

        // send emails
        // dispatch(new \App\Jobs\SubmissionEmail($user->id));
        
        return response()->json(['msg' => 'Rental Schedule successfully created.'], 200);
    }
}
