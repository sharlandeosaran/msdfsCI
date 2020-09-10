<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Validator;

class CriticalIncidentController extends Controller
{
    public function index()
    {
        $data = 
        [
            'title' => 'Critical Incident Form',
            'regions' => \App\Region::ordered(),
            'communities' => \App\Community::ordered(),
            'id_state' => \App\IDState::ordered(),
            'items_lost_or_damaged' => \App\ItemsLostOrDamaged::all(),
            'disasters' => \App\Disaster::all(),
            'housing_type' => \App\HousingType::all(),
            'total_income' => \App\TotalIncome::ordered(),
            'relationships' => \App\Relationship::all(),
            'employment_status' => \App\EmploymentStatus::ordered(),
            'marital_status' => \App\MaritalStatus::ordered(),
            'employment_list' => \App\EmploymentList::employmentlist(),
            'form' => 'critical',
        ];
        // dd($data);
        
        return view('critical.wizard.wizard', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), 
        [
            "othername" => "nullable|max:150",
            "email" => "nullable|email|max:250",
            "marital_status" => "required|exists:marital_status,id",
            "critical_national_id_state" => "required|exists:id_states,id",
            "drivers_permit" => "nullable|max:150",
            "passport" => "nullable|max:150",
            "housing_type" => "required|exists:housing_types,id",

            "landlord_first_name" => [
                "nullable",
                "max:150",
                Rule::requiredIf($request->housing_type == 4),
            ],
            "landlord_surname" => [
                "nullable",
                "max:150",
                Rule::requiredIf($request->housing_type == 4),
            ],
            "landlord_contact_no" => [
                "nullable",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/",
                Rule::requiredIf($request->housing_type == 4),
            ],
            "rental_amount" => [
                "nullable",
                "numeric",
                "min:0",
                Rule::requiredIf($request->housing_type == 4),
            ],
            
            "home_address" => "required|max:250",
            "region" => "required|max:25",
            "city_town" => "required|max:25",
            "primary_mobile_contact" => [
                "required",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/",
            ],
            "secondary_mobile_contact" => [
                "nullable",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/",
            ],
            "land_line_telephone_contact" => [
                "nullable",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/",
            ],

            "hi_first_name" => "array",
            "hi_surname" => "array",
            "hi_gender" => "array",
            "hi_relationship" => "array",
            "hi_relationship_other" => "array",
            "hi_dob" => "required|array",
            "hi_emp_status" => "array",
            "hi_emp_status_other" => "array",
            "hi_national_id" => "array",
            "hi_total_income" => "required|numeric|min:0",
            
            "hi_first_name.*" => "required|max:100",
            "hi_surname.*" => "required|max:100",
            "hi_gender.*" => [
                'required',
                Rule::in(['M', 'F']),
            ],
            "hi_relationship.*" => "required|max:25",
            "hi_relationship_other.*" => "nullable|max:25",
            "hi_dob.*" => "required|date_format:Y-m-d",
            "hi_emp_status.*" => "required|exists:employment_status,id",
            "hi_emp_status_other.*" => "nullable|max:25",
            "hi_national_id.1" => "required|regex:/^[0-9]{11}+$/",
            "hi_national_id.*" => "nullable|regex:/^[0-9]{11}+$/",

            "disaster" => "required|max:150",
            "other_disaster" => "nullable|max:150",
            "housing_damage" => [
                'required',
                Rule::in(['Y', 'N']),
            ],
            "housing_repairs" => "nullable|max:250",
            "insurer_name" => "nullable|max:250",
            "insurer_address" => "nullable|max:250",
            "insurer_contact" => "nullable|max:250",
            "items_lost_or_damaged" => "array",
            "recovery_needs" => "array",

            "items_lost_or_damaged.*" => "nullable|exists:items_lost_or_damaged,id",            
            "recovery_needs.*" => "nullable|max:25", 

            "declaration_signature" => "required",
            // "g-recaptcha-response" => "required",

            // uploaded files
            "signature" => "required_without:signature_name|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            "id_card_front" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf(($request->critical_national_id_state == '1') && !$request->id_card_front_name),
            ],
            "id_card_back" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf(($request->critical_national_id_state == '1') && !$request->id_card_back_name),
            ],

            "lost_id_police_report" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->critical_national_id_state == '2' && !$request->lost_id_police_report_name),
            ],
            "ebc_id_letter" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->critical_national_id_state == '3' && !$request->ebc_id_letter_name),
            ],

            "landlord_id_card_front" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->housing_type == 4 && !$request->landlord_id_card_front_name),
            ],
            "landlord_id_card_back" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->housing_type == 4 && !$request->landlord_id_card_back_name),
            ],
            "utility_bill" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->housing_type == 4 && !$request->utility_bill_name),
            ],
            "rental_agreement" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->housing_type == 4 && !$request->rental_agreement_name),
            ],
            "rent_receipt" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->housing_type == 4 && !$request->rent_receipt_name),
            ],

            'housing_relief_quotation' => "nullable|array",
            'housing_relief_quotation.*' => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            'school_supplies_relief_quotation' => "nullable|array",
            'school_supplies_relief_quotation.*' => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            "fire_service_report" => "array",
            "fire_service_report.*" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            "regional_corporation_flooding_report" => "array",
            "regional_corporation_flooding_report.*" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            "clothing_relief_quotation" => "array",
            "clothing_relief_quotation.*" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            
            'water_marks' => "nullable|array",
            'water_marks.*' => "max:10000|mimes:jpg,jpeg,png",
            'structural_damage' => "nullable|array",
            'structural_damage.*' => "max:10000|mimes:jpg,jpeg,png",
            'damaged_household_items' => "nullable|array",
            'damaged_household_items.*' => "max:10000|mimes:jpg,jpeg,png",
            'electrical_damage' => "nullable|array",
            'electrical_damage.*' => "max:10000|mimes:jpg,jpeg,png",
            'plumbing_damage' => "nullable|array",
            'plumbing_damage.*' => "max:10000|mimes:jpg,jpeg,png",

            // "cert_incorporation_registration" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "recommendation_letter" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
        ],
        [
            'landlord_first_name.required' => 'The landlord first name field is required when rental assistance is sought.',
            'landlord_surname.required' => 'The landlord surname field is required when rental assistance is sought.',
            'landlord_contact_no.required' => 'The landlord contact number field is required when rental assistance is sought.',
            'rental_amount.required' => 'The rental amount field is required when rental assistance is sought.',
            
            'hi_total_before.required' => 'The total income before reduction field is required.',
            'hi_total_before.numeric' => 'The total income before reduction must be a number.',
            'hi_dob.*.date_format' => 'The date of birth does not match the format yyyy-mm-dd.',
            'hi_dob.1.required' => 'The applicant date of birth field is required.',
            'hi_dob.*.required' => 'The household occupant date of birth field is required.',
            'hi_relationship.*.required' => 'The household occupant relationship field is required.',
            'hi_emp_status.*.required' => 'The household occupant employment status field is required.',
            'hi_first_name.1.required' => 'The first name field is required.',
            'hi_first_name.*.required' => 'The household occupant first name field is required.',
            'hi_surname.1.required' => 'The surname field is required.',
            'hi_surname.*.required' => 'The household occupant surname field is required.',
            'hi_national_id.*.regex' => 'The format for the national id is xxxxxxxxxxx (11 digits).',
            'hi_national_id.*.required' => 'The national ID field is required.',
            'hi_total_income.1.required' => 'The applicant total income field is required.',

            'effective_date.date_format' => 'The effective date does not match the format yyyy-mm-dd.',
            'contact_no.regex' => 'The format for the contact number is (xxx) xxx-xxxx.',
            'landlord_contact_no.regex' => 'The format for the contact number is (xxx) xxx-xxxx.',
            'recommender_contact_no.regex' => 'The format for the contact number is (xxx) xxx-xxxx.',
            'nis.regex' => 'The format for the national insurance number is xxxxxxxxx (9 digits).',

            'scotia_area.required_if' => 'The branch area field is required when bank name is Scotiabank.',
            'bank_branch.required' => 'The bank branch field is required when bank name is present.',
            
            'signature.required_without' => 'The signature field is required.',
            'employer_recommender_letter.required_without' => 'The employer recommender letter field is required.',

            '*.mimes' => 'The upload must be a PDF, Word document, PNG or JPEG.',
        ]
        );
        
        $validator->after(function ($validator)  use ($request) 
        {
            if ($request->hi_dob) 
            {
                foreach ($request->hi_dob as $key => $value) {
                    if (!isset($request->hi_gender[$key])) {
                        $validator->errors()->add('hi_gender.'.$key, 'The gender field is required.');
                    }
                    
                    if (!isset($request->hi_relationship[$key])) {
                        $validator->errors()->add('hi_relationship.'.$key, 'The relationship field is required.');
                    }
                    
                    if (!isset($request->hi_emp_status[$key])) {
                        $validator->errors()->add('hi_emp_status.'.$key, 'The employment status field is required.');
                    }
                }
            }

            // check recaptcha if in production
            if (\App::environment('production')) 
            {
                $url = 'https://www.google.com/recaptcha/api/siteverify';
                $data = [
                    'secret' => config('captcha.secret', ''),
                    'response' => $_POST["g-recaptcha-response"]
                ];
                $query = http_build_query($data);
                $options = [
                    'http' => [
                        'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Content-Length: ".strlen($query)."\r\n".
                        "User-Agent:MyAgent/1.0\r\n",
                        'method' => 'POST',
                        'content' => http_build_query($data)
                    ]
                ];
                $context  = stream_context_create($options);
                $verify = file_get_contents($url, false, $context);
                $captcha_success=json_decode($verify);

                if ($captcha_success->success==false) {
                    $validator->errors()->add('captcha', 'Invalid captcha!');
                }
            }
        });
        
        if ($validator->fails()) 
        {
            $uploads = app('App\Http\Controllers\FileController')->store($request);

            if ($uploads && $uploads['response'] && $request->tempfiles) {
                $old = (array) json_decode($request->tempfiles);
                $new = (array) json_decode($uploads['list']);
                $merge = array_merge($old,$new);

                return redirect('/form/critical')
                ->withInput()
                ->withErrors($validator)
                ->with('tempfiles', json_encode($merge))
                ;
            } elseif ($uploads && $uploads['response']) {
                return redirect('/form/critical')
                ->withInput()
                ->withErrors($validator)
                ->with('tempfiles', $uploads['list'])
                ;
            } elseif ($request->tempfiles) {
                return redirect('/form/critical')
                ->withInput()
                ->withErrors($validator)
                ->with('tempfiles', $request->tempfiles)
                ;
            } else {
                return redirect('/form/critical')
                ->withInput()
                ->withErrors($validator)
                ;
            }
        }

        // store application
        $application = new \App\Application();
        $application->ip =  $_SERVER['REMOTE_ADDR']? $_SERVER['REMOTE_ADDR'] : 'N/A';
        $application->form_id = 3;
        $application->reference_number = reference_number();
        $application->save();

        // create CI form 
        $ci_form = new \App\FormCriticalIncident();
        $ci_form->application_id = $application->id;
        $ci_form->disaster_id = $request->disaster;
        $ci_form->disaster_other = $request->other_disaster;
        $ci_form->housing_damage = $request->housing_damage;
        $ci_form->housing_repairs = $request->housing_repairs;
        $ci_form->insured = $request->housing_infrastructure_insured;
        $ci_form->save();

        // store insurer details
        if ($request->housing_infrastructure_insured == 'Y') 
        {
            $insurer = new \App\Insurer();
            $insurer->form_critical_incident_id = $ci_form->id;
            $insurer->insurer_name = $request->insurer_name;
            $insurer->insurer_address = $request->insurer_address;
            $insurer->insurer_contact = $request->insurer_contact;
            $insurer->save();
        }

        // store items damaged
        if ($request->items_lost_or_damaged) 
        {
            foreach ($request->items_lost_or_damaged as $key => $id) {
                $damageditem = new \App\FormCIItemsLost();
                $damageditem->form_critical_incident_id  = $ci_form->id;
                $damageditem->item_id  = $id;
                $damageditem->save();
            }
        }

        // create household
        $household = new \App\Household();
        $household->housing_type_id = $request->housing_type;
        $household->address1 = $request->home_address;
        $household->community_id = $request->city_town;
        $household->total_income_id = $request->hi_total_income;
        $household->save();

        // landlord info
        if ($request->housing_type == 4) {
            $landlord = new \App\Landlord();
            $landlord->household_id = $household->id;
            $landlord->first_name = $request->landlord_first_name;
            $landlord->surname = $request->landlord_surname;
            $landlord->contact = $request->landlord_contact_no;
            $landlord->rental_amount = $request->rental_amount;
            $landlord->save();
        }
        
        // store applicants
        // sort list
        $names = [];
        foreach ($request->hi_first_name as $key => $value) 
        {
            $names[$key] = [
                'first_name' => $request->hi_first_name[$key],
                'surname' => $request->hi_surname[$key],
                'key' => $key,
            ];
        }
        array_multisort(
            array_column($names, 'first_name'),  SORT_ASC,
            array_column($names, 'surname'), SORT_ASC,
            $names
        );
        // dd($names);

        // create persons and applicant
        foreach ($names as $order => $value) 
        {
            // create person
            $person = new \App\Person();
            $person->first_name = $request->hi_first_name[$value['key']];
            $person->surname = $request->hi_surname[$value['key']];
            $person->othername = $value['key'] == 1? $request->othername : null;
            $person->email = $value['key'] == 1? $request->email : null;
            $person->gender = $request->hi_gender[$value['key']];
            $person->dob = $request->hi_dob[$value['key']];
            $person->marital_status_id = $value['key'] == 1? $request->marital_status : null;
            $person->marital_status_other = $value['key'] == 1? $request->hi_emp_status_other[$value['key']] : null;
            $person->national_id = $request->hi_national_id[$value['key']];
            $person->national_id_state_id = $value['key'] == 1? $request->critical_national_id_state : null;
            $person->drivers_permit = $value['key'] == 1? $request->drivers_permit : null;
            $person->passport = $value['key'] == 1? $request->passport : null;
            $person->employment_status_id = $request->hi_emp_status[$value['key']];
            $person->employment_status_other = $request->hi_emp_status_other[$value['key']];
            $person->primary_mobile_contact = $value['key'] == 1? $request->primary_mobile_contact : null;
            $person->secondary_mobile_contact = $value['key'] == 1? $request->secondary_mobile_contact : null;
            $person->land_line_telephone_contact = $value['key'] == 1? $request->land_line_telephone_contact : null;
            $person->save();

            // add person to household
            $person_household = new \App\PersonHousehold();
            $person_household->person_id = $person->id;
            $person_household->household_id = $household->id;
            $person_household->relationship_id = $request->hi_relationship[$value['key']];
            $person_household->relationship_other = isset($request->hi_relationship_other[$value['key']])? $request->hi_relationship_other[$value['key']] : null;
            $person_household->save();

            // create applicant
            if ($value['key'] == 1) {
                $applicant = new \App\Applicant();
                $applicant->application_id = $application->id;
                $applicant->person_id = $person->id;
                $applicant->order = $order;
                $applicant->save();
            }
        }

        // documents 
        // accepted file types
        $types = ['application/msword', 'text/plain', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/png', 'image/jpg', 'image/jpeg'];

        // dd($request->all());
            
        // signature
        if ($request->file('signature') !== null) {
            if ($request->file('signature')->isValid()) {
                
                // get file type
                $type = $request->file('signature')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_signature_'.$request->file('signature')->getClientOriginalName();
                    // upload upload
                    $path = $request->signature->storeAs('uploads/applications/'.$application->id.'/signature', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'signature';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
            
        // id_card_front
        if ($request->file('id_card_front') !== null) {
            if ($request->file('id_card_front')->isValid()) {
                
                // get file type
                $type = $request->file('id_card_front')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_id_card_front_'.$request->file('id_card_front')->getClientOriginalName();
                    // upload upload
                    $path = $request->id_card_front->storeAs('uploads/applications/'.$application->id.'/id_card_front', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'id_card_front';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
            
        // id_card_back
        if ($request->file('id_card_back') !== null) {
            if ($request->file('id_card_back')->isValid()) {
                
                // get file type
                $type = $request->file('id_card_back')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_id_card_back_'.$request->file('id_card_back')->getClientOriginalName();
                    // upload upload
                    $path = $request->id_card_back->storeAs('uploads/applications/'.$application->id.'/id_card_back', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'id_card_back';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
            
        // lost_id_police_report
        if ($request->file('lost_id_police_report') !== null) {
            if ($request->file('lost_id_police_report')->isValid()) {
                
                // get file type
                $type = $request->file('lost_id_police_report')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_lost_id_police_report_'.$request->file('lost_id_police_report')->getClientOriginalName();
                    // upload upload
                    $path = $request->lost_id_police_report->storeAs('uploads/applications/'.$application->id.'/lost_id_police_report', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'lost_id_police_report';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
            
        // ebc_id_letter
        if ($request->file('ebc_id_letter') !== null) {
            if ($request->file('ebc_id_letter')->isValid()) {
                
                // get file type
                $type = $request->file('ebc_id_letter')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_ebc_id_letter_'.$request->file('ebc_id_letter')->getClientOriginalName();
                    // upload upload
                    $path = $request->ebc_id_letter->storeAs('uploads/applications/'.$application->id.'/ebc_id_letter', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'ebc_id_letter';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
            
        // landlord_id_card_front
        if ($request->file('landlord_id_card_front') !== null) {
            if ($request->file('landlord_id_card_front')->isValid()) {
                
                // get file type
                $type = $request->file('landlord_id_card_front')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_landlord_id_card_front_'.$request->file('landlord_id_card_front')->getClientOriginalName();
                    // upload upload
                    $path = $request->landlord_id_card_front->storeAs('uploads/applications/'.$application->id.'/landlord_id_card_front', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'landlord_id_card_front';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
            
        // landlord_id_card_back
        if ($request->file('landlord_id_card_back') !== null) {
            if ($request->file('landlord_id_card_back')->isValid()) {
                
                // get file type
                $type = $request->file('landlord_id_card_back')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_landlord_id_card_back_'.$request->file('landlord_id_card_back')->getClientOriginalName();
                    // upload upload
                    $path = $request->landlord_id_card_back->storeAs('uploads/applications/'.$application->id.'/landlord_id_card_back', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'landlord_id_card_back';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
            
        // utility_bill
        if ($request->file('utility_bill') !== null) {
            if ($request->file('utility_bill')->isValid()) {
                
                // get file type
                $type = $request->file('utility_bill')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_utility_bill_'.$request->file('utility_bill')->getClientOriginalName();
                    // upload upload
                    $path = $request->utility_bill->storeAs('uploads/applications/'.$application->id.'/utility_bill', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'utility_bill';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
            
        // rental_agreement
        if ($request->file('rental_agreement') !== null) {
            if ($request->file('rental_agreement')->isValid()) {
                
                // get file type
                $type = $request->file('rental_agreement')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_rental_agreement_'.$request->file('rental_agreement')->getClientOriginalName();
                    // upload upload
                    $path = $request->rental_agreement->storeAs('uploads/applications/'.$application->id.'/rental_agreement', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'rental_agreement';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
            
        // rent_receipt
        if ($request->file('rent_receipt') !== null) {
            if ($request->file('rent_receipt')->isValid()) {
                
                // get file type
                $type = $request->file('rent_receipt')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_rent_receipt_'.$request->file('rent_receipt')->getClientOriginalName();
                    // upload upload
                    $path = $request->rent_receipt->storeAs('uploads/applications/'.$application->id.'/rent_receipt', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'rent_receipt';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
        
        // housing_relief_quotation
        if ($request->file('housing_relief_quotation') !== null) {
            foreach ($request->file('housing_relief_quotation') as $i => $other) {
                if ($request->file('housing_relief_quotation'.'.'.$i) !== null) {
                    if ($request->file('housing_relief_quotation'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('housing_relief_quotation.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $types)) {
                            $document = $application->id.'_housing_relief_quotation_'.$i.'_'.$request->file('housing_relief_quotation'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('housing_relief_quotation'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/housing_relief_quotation', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'housing_relief_quotation_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
                            $file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }
        
        // school_supplies_relief_quotation
        if ($request->file('school_supplies_relief_quotation') !== null) {
            foreach ($request->file('school_supplies_relief_quotation') as $i => $other) {
                if ($request->file('school_supplies_relief_quotation'.'.'.$i) !== null) {
                    if ($request->file('school_supplies_relief_quotation'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('school_supplies_relief_quotation.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $types)) {
                            $document = $application->id.'_school_supplies_relief_quotation_'.$i.'_'.$request->file('school_supplies_relief_quotation'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('school_supplies_relief_quotation'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/school_supplies_relief_quotation', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'school_supplies_relief_quotation_'.$i;
                            $file->document = $document;
                            $file->path = $path;
                            $file->document_type_id = $mime;
                            $file->save();
                        }
                    }
                }
            }
        }
        
        // fire_service_report
        if ($request->file('fire_service_report') !== null) {
            foreach ($request->file('fire_service_report') as $i => $other) {
                if ($request->file('fire_service_report'.'.'.$i) !== null) {
                    if ($request->file('fire_service_report'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('fire_service_report.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $types)) {
                            $document = $application->id.'_fire_service_report_'.$i.'_'.$request->file('fire_service_report'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('fire_service_report'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/fire_service_report', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'fire_service_report_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
                            $file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }
        
        // regional_corporation_flooding_report
        if ($request->file('regional_corporation_flooding_report') !== null) {
            foreach ($request->file('regional_corporation_flooding_report') as $i => $other) {
                if ($request->file('regional_corporation_flooding_report'.'.'.$i) !== null) {
                    if ($request->file('regional_corporation_flooding_report'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('regional_corporation_flooding_report.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $types)) {
                            $document = $application->id.'_regional_corporation_flooding_report_'.$i.'_'.$request->file('regional_corporation_flooding_report'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('regional_corporation_flooding_report'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/regional_corporation_flooding_report', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'regional_corporation_flooding_report_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
                            $file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }
        
        // clothing_relief_quotation
        if ($request->file('clothing_relief_quotation') !== null) {
            foreach ($request->file('clothing_relief_quotation') as $i => $other) {
                if ($request->file('clothing_relief_quotation'.'.'.$i) !== null) {
                    if ($request->file('clothing_relief_quotation'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('clothing_relief_quotation.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $types)) {
                            $document = $application->id.'_clothing_relief_quotation_'.$i.'_'.$request->file('clothing_relief_quotation'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('clothing_relief_quotation'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/clothing_relief_quotation', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'clothing_relief_quotation_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
                            $file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }

        // images 
        // accepted file types
        $images = ['image/png', 'image/jpg', 'image/jpeg'];
        
        // water_marks
        if ($request->file('water_marks') !== null) {
            foreach ($request->file('water_marks') as $i => $other) {
                if ($request->file('water_marks'.'.'.$i) !== null) {
                    if ($request->file('water_marks'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('water_marks.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $images)) {
                            $document = $application->id.'_water_marks_'.$i.'_'.$request->file('water_marks'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('water_marks'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/water_marks', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'water_marks_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
                            $file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }
        
        // structural_damage
        if ($request->file('structural_damage') !== null) {
            foreach ($request->file('structural_damage') as $i => $other) {
                if ($request->file('structural_damage'.'.'.$i) !== null) {
                    if ($request->file('structural_damage'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('structural_damage.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $images)) {
                            $document = $application->id.'_structural_damage_'.$i.'_'.$request->file('structural_damage'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('structural_damage'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/structural_damage', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'structural_damage_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
                            $file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }
        
        // damaged_household_items
        if ($request->file('damaged_household_items') !== null) {
            foreach ($request->file('damaged_household_items') as $i => $other) {
                if ($request->file('damaged_household_items'.'.'.$i) !== null) {
                    if ($request->file('damaged_household_items'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('damaged_household_items.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $images)) {
                            $document = $application->id.'_damaged_household_items_'.$i.'_'.$request->file('damaged_household_items'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('damaged_household_items'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/damaged_household_items', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'damaged_household_items_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
                            $file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }
        
        // electrical_damage
        if ($request->file('electrical_damage') !== null) {
            foreach ($request->file('electrical_damage') as $i => $other) {
                if ($request->file('electrical_damage'.'.'.$i) !== null) {
                    if ($request->file('electrical_damage'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('electrical_damage.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $images)) {
                            $document = $application->id.'_electrical_damage_'.$i.'_'.$request->file('electrical_damage'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('electrical_damage'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/electrical_damage', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'electrical_damage_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
                            $file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }
        
        // plumbing_damage
        if ($request->file('plumbing_damage') !== null) {
            foreach ($request->file('plumbing_damage') as $i => $other) {
                if ($request->file('plumbing_damage'.'.'.$i) !== null) {
                    if ($request->file('plumbing_damage'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('plumbing_damage.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        if (in_array($type, $images)) {
                            $document = $application->id.'_plumbing_damage_'.$i.'_'.$request->file('plumbing_damage'.'.'.$i)->getClientOriginalName();
                            // upload upload
                            $path = $request->file('plumbing_damage'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/plumbing_damage', $document);
                            // save name to application
                            $file = new \App\ApplicationDocument();
                            $file->application_id = $application->id;
                            $file->file = 'plumbing_damage_'.$i;
                            $file->document = $document;
                            $file->document_type_id = $mime;
                            $file->path = $path;
                            $file->save();
                        }
                    }
                }
            }
        }

        // get uploads from temp storage
        if ($request->tempfiles) {
            $old = (array) json_decode($request->tempfiles);
            // dd($old);
            foreach ($old as $key => $file) {
                // move file if exists and in allowed file types
                if (in_array($file->mime, $types)) {
                    if(Storage::exists($file->name)) {
                        $document = $application->id.'_'.$key.'_'.$file->postname;

                        // move file
                        $path = 'uploads/applications/'.$application->id.'/'.$key.'/'.$document;
                        Storage::move($file->name, $path);
                        
                        // get file type
                        $get = \App\DocumentType::where('mime', $file->mime)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        // save name to application
                        $file = new \App\ApplicationDocument();
                        $file->application_id = $application->id;
                        $file->file = $key;
                        $file->document = $document;
                        $file->document_type_id = $mime;
                        $file->path = $path;
                        $file->save();
                    }
                }
            }
        }
        // dd();

        // send email
        \Mail::send(new \App\Mail\Application\FormCIApplication($application));
        
        return redirect('/thanks')->
            with([
                'success' => 'Submission sent successfully.', 
                'reference_number' => $application->reference_number,
            ]);
    }
}
