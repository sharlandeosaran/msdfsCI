<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Validator;

class FormAController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'APPLICATION FORM A-EMPLOYER/EMPLOYEE',
            'regions' => \App\Region::ordered(),
            'cities' => \App\Community::ordered(),
            'assistance' => \App\AssistanceSought::ordered(),

            'banks' => \App\Bank::all(),
            'scotia' => \App\ScotiaBranch::all(),
            'citizen_proof' => \App\CitizenProof::ordered(),
            'id_state' => \App\IDState::ordered(),
            'job_title' => \App\JobTitle::all(),
            'total_income' => \App\TotalIncome::all(),
            'relationships' => \App\Relationship::all(),
            'employment_status' => \App\EmploymentStatus::all(),
            'form' => 'A',
        ];
        
        return view('form_a.wizard.wizard', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), 
        [
            "contact_no" => [
                "required",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/"
            ],
            "email" => "required|email|max:250",
            "home_address" => "required|max:250",
            "city_town" => "required|max:25",
            "proof_of_citizenship" => "required|max:50",
            "national_id_state" => "required|max:50",
            "nis" => "nullable|regex:/^[0-9]{9}+$/",
            "employment_classification" => "required|max:14",
            "effective_date" => "required|date_format:Y-m-d",
            "job_title" => "nullable|max:150",
            "assistance_sought" => "required|array",

            "assistance_sought.*" => [
                'nullable',
                Rule::in(['on']),
            ],

            "landlord_first_name" => [
                "nullable",
                "max:50",
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought)),
            ],
            "landlord_surname" => [
                "nullable",
                "max:50",
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought)),
            ],
            "landlord_contact_no" => [
                "nullable",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/",
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought)),
            ],
            "rental_amount" => [
                "nullable",
                "numeric",
                "min:0",
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought)),
            ],

            "bank_name" => "nullable|max:25",
            "bank_branch" => [
                'nullable',
                'max:25',
                Rule::requiredIf($request->bank_name != '2' && $request->bank_name),
            ],
            "scotia_area" => "nullable|numeric|required_if:bank_name,2",
            "bank_account" => "nullable|max:15|regex:/^[0-9-]+$/|required_with:bank_name",

            "emp_name" => "required|max:100",
            "emp_address" => "required|max:250",
            "emp_auth_person" => "required|max:100",
            "emp_contact" => [
                "required",
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
            "hi_income" => "required|array",
            "hi_national_id" => "required|array",
            "hi_total_before" => "required|numeric|min:0",
            
            "hi_first_name.*" => "required|max:100",
            "hi_surname.*" => "required|max:100",
            "hi_gender.*" => [
                'required',
                Rule::in(['M', 'F']),
            ],
            "hi_relationship.*" => "required|exists:relationships,id",
            "hi_relationship_other.*" => [
                'nullable',
                'max:150',
                // Rule::requiredIf(($request->national_id_state == 1 || $request->proof_of_citizenship == 1) && !$request->id_card_front_name),
            ],
            "hi_dob.*" => "required|date_format:Y-m-d",
            "hi_emp_status.*" => "required|exists:employment_status,id",
            "hi_emp_status_other.*" => [
                'nullable',
                'max:150',
                // Rule::requiredIf(($request->national_id_state == 1 || $request->proof_of_citizenship == 1) && !$request->id_card_front_name),
            ],
            "hi_income.1" => "required",
            "hi_income.*" => "nullable|numeric|min:0",
            "hi_national_id.1" => "required|regex:/^[0-9]{11}+$/",
            "hi_national_id.*" => "nullable|regex:/^[0-9]{11}+$/",

            "declaration_signature" => "required",
            // "g-recaptcha-response" => "required",

            // uploaded files
            "signature" => "required_without:signature_name|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "employer_recommender_letter" => "required_without:employer_recommender_letter_name|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            "id_card_front" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf(($request->national_id_state == 1 || $request->proof_of_citizenship == 1) && !$request->id_card_front_name),
            ],
            "id_card_back" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf(($request->national_id_state == 1 || $request->proof_of_citizenship == 1) && !$request->id_card_back_name),
            ],

            "lost_id_police_report" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->national_id_state == 2 && !$request->lost_id_police_report_name),
            ],
            "ebc_id_letter" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->national_id_state == 3 && !$request->ebc_id_letter_name),
            ],

            "cert_immigration_status" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->proof_of_citizenship == 2 && !$request->cert_immigration_status_name),
            ],
            "cert_residence" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->proof_of_citizenship == 3 && !$request->cert_residence_name),
            ],

            "passport_bio" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->proof_of_citizenship == 4 && !$request->passport_bio_name),
            ],
            "passport_stamp" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->proof_of_citizenship == 4 && !$request->passport_stamp_name),
            ],

            "utility_bill" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->utility_bill_name),
            ],
            "landlord_id_card_front" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->landlord_id_card_front_name),
            ],
            "landlord_id_card_back" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->landlord_id_card_back_name),
            ],
            "rental_agreement" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->rental_agreement_name),
            ],
            "rent_receipt" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->rent_receipt_name),
            ],

            "proof_of_earnings" => "array",
            "proof_of_earnings.*" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
        ],
        [
            'assistance_sought.required' => 'The assistance being sought is required.',

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
            'hi_first_name.*.required' => 'The household occupant first name field is required.',
            'hi_surname.*.required' => 'The household occupant surname field is required.',
            'hi_income.1.required' => 'The applicant total income field is required.',

            'effective_date.date_format' => 'The effective date does not match the format yyyy-mm-dd.',
            'contact_no.regex' => 'The format for the contact number is (xxx) xxx-xxxx.',
            'landlord_contact_no.regex' => 'The format for the contact number is (xxx) xxx-xxxx.',
            'emp_contact.regex' => 'The format for the contact number is (xxx) xxx-xxxx.',
            'nis.regex' => 'The format for the national insurance number is xxxxxxxxx (9 digits).',
            'national_id.regex' => 'The format for the national id is xxxxxxxxxxx (11 digits).',

            'scotia_area.required_if' => 'The branch area field is required when bank name is Scotiabank.',
            'bank_branch.required' => 'The bank branch field is required when bank name is present.',
            
            'signature.required_without' => 'The signature field is required.',
            'employer_recommender_letter.required_without' => 'The employer recommender letter field is required.',

            '*.mimes' => 'The upload must be a PDF, Word document, PNG or JPEG.',
        ]
        );

        // check for recaptcha
        $validator->after(function ($validator)  use ($request) 
        {
            if ($request->hi_name) {
                foreach ($request->hi_name as $key => $value) {
                    if (!isset($request->hi_gender[$key])) {
                        $validator->errors()->add('hi_gender.'.$key, 'The gender field is required.');
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
        
        if ($validator->fails()) {
            $uploads = app('App\Http\Controllers\FileController')->store($request);

            if ($uploads && $uploads['response'] && $request->tempfiles) {
                $old = (array) json_decode($request->tempfiles);
                $new = (array) json_decode($uploads['list']);
                $merge = array_merge($old,$new);

                return redirect('/form/a')
                ->withInput()
                ->withErrors($validator)
                ->with('tempfiles', json_encode($merge))
                ;
            } elseif ($uploads && $uploads['response']) {
                return redirect('/form/a')
                ->withInput()
                ->withErrors($validator)
                ->with('tempfiles', $uploads['list'])
                ;
            } elseif ($request->tempfiles) {
                return redirect('/form/a')
                ->withInput()
                ->withErrors($validator)
                ->with('tempfiles', $request->tempfiles)
                ;
            } else {
                return redirect('/form/a')
                ->withInput()
                ->withErrors($validator)
                ;
            }
        }
        // dd();

        // store application
        $application = new \App\Application();
        $application->ip =  $_SERVER['REMOTE_ADDR']? $_SERVER['REMOTE_ADDR'] : 'N/A';
        $application->form_id = 1;
        $application->save();

        // get employment classification
        $employment_classification = \App\EmploymentList::where('slug', $request->employment_classification)->first();

        // create form A
        $form_a = new \App\FormA();
        $form_a->application_id = $application->id;
        $form_a->employment_list_id = $employment_classification->id;
        $form_a->effective_date = $request->effective_date;
        $form_a->employer_name = $request->emp_name;
        $form_a->employer_address = $request->emp_address;
        $form_a->employer_authorized_person = $request->emp_auth_person;
        $form_a->employer_contact = $request->emp_contact;
        $form_a->save();

        // assistance sought
        foreach ($request->assistance_sought as $key => $value) {
            $assistance = new \App\ApplicationAssistanceSought();
            $assistance->application_id = $application->id;
            $assistance->assistance_sought_id = $key;
            $assistance->save();
        }

        // create household
        $household = new \App\Household();
        $household->housing_type_id = $request->housing_type;
        $household->address1 = $request->home_address;
        $household->community_id = $request->city_town;
        $household->total_income = $request->hi_total_income;
        $household->save();

        // landlord info
        if ($request->assistance_sought && array_key_exists(2, $request->assistance_sought)) {
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
                'id' => '',
            ];
        }
        array_multisort(
            array_column($names, 'first_name'),  SORT_ASC,
            array_column($names, 'surname'), SORT_ASC,
            $names
        );
        // dd($names);

        // create people and applicant
        foreach ($names as $order => $value) 
        {
            // create person
            $person = new \App\Person();
            $person->first_name = $request->hi_first_name[$value['key']];
            $person->surname = $request->hi_surname[$value['key']];
            $person->gender = $request->hi_gender[$value['key']];
            $person->primary_mobile_contact = $value['key'] == 1? $request->primary_mobile_contact : null;
            $person->email = $value['key'] == 1? $request->email : null;
            $person->national_id = $request->hi_national_id[$value['key']];
            $person->national_id_state_id = $value['key'] == 1? $request->national_id_state : null;
            $person->nis = $value['key'] == 1? $request->nis : null;

            $person->dob = $request->hi_dob[$value['key']];
            $person->employment_status_id = $value['key'] == 1? 6 : $request->hi_emp_status[$value['key']];
            $person->employment_status_other = $value['key'] == 1? $employment_classification->employment_classification : $request->hi_emp_status_other[$value['key']];
            $person->income = $request->hi_income[$value['key']];

            $person->save();

            // get person id
            $names[$order]['id'] = $person->id;

            // add person to household
            $person_household = new \App\PersonHousehold();
            $person_household->person_id = $person->id;
            $person_household->household_id = $household->id;
            $person_household->relationship_id = $value['key'] == 1? 0 : $request->hi_relationship[$value['key']];
            $person_household->relationship_other = isset($request->hi_relationship_other[$value['key']])? $request->hi_relationship_other[$value['key']] : null;
            $person_household->save();

            if ($value['key'] == 1) {
                // create applicant
                $applicant = new \App\Applicant();
                $applicant->application_id = $application->id;
                $applicant->person_id = $person->id;
                $applicant->order = $order;
                $applicant->save();
                
                // create bank
                if ($request->bank_name) {
                    $bank = new \App\PersonBank();
                    $bank->person_id = $person->id;
                    $bank->bank_id = $request->bank_name;
                    $bank->scotia_branch_id = $request->scotia_area == 0? null : $request->scotia_area;
                    $bank->branch = $request->bank_branch;
                    $bank->account = $request->bank_account;
                    $bank->save();
                }
            }
        }
        // dump($household);
        // dd($names);

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
            
        // employer_recommender_letter
        if ($request->file('employer_recommender_letter') !== null) {
            if ($request->file('employer_recommender_letter')->isValid()) {
                
                // get file type
                $type = $request->file('employer_recommender_letter')->getMimeType();
                $get = \App\DocumentType::where('mime', $type)->first();
                if ($get) {
                    $mime = $get->id;
                } else {
                    $mime = null;
                }
                
                if (in_array($type, $types)) {
                    $document = $application->id.'_employer_recommender_letter_'.$request->file('employer_recommender_letter')->getClientOriginalName();
                    // upload upload
                    $path = $request->employer_recommender_letter->storeAs('uploads/applications/'.$application->id.'/employer_recommender_letter', $document);
                    // save name to application
                    $file = new \App\ApplicationDocument();
                    $file->application_id = $application->id;
                    $file->file = 'employer_recommender_letter';
                    $file->document = $document;
                    $file->document_type_id = $mime;
                    $file->path = $path;
                    $file->save();
                }
            }
        }
        
        // get people list
        $people = array_column($names, 'id', 'key');
        // dd($people);
        
        // proof_of_earnings
        if ($request->file('proof_of_earnings') !== null) {
            foreach ($request->file('proof_of_earnings') as $i => $other) {
                if ($request->file('proof_of_earnings'.'.'.$i) !== null) {
                    if ($request->file('proof_of_earnings'.'.'.$i)->isValid()) {
                        
                        // get file type
                        $type = $request->file('proof_of_earnings.'.$i)->getMimeType();
                        $get = \App\DocumentType::where('mime', $type)->first();
                        if ($get) {
                            $mime = $get->id;
                        } else {
                            $mime = null;
                        }
                        
                        $document = $application->id.'_proof_of_earnings_'.$people[$i].'_'.$request->file('proof_of_earnings'.'.'.$i)->getClientOriginalName();
                        // upload upload
                        $path = $request->file('proof_of_earnings'.'.'.$i)->storeAs('uploads/applications/'.$application->id.'/proof_of_earnings', $document);
                        // save name to application
                        $file = new \App\ApplicationDocument();
                        $file->application_id = $application->id;
                        $file->file = 'proof_of_earnings_'.$people[$i];
                        $file->document = $document;
                        $file->document_type_id = $mime;
                        $file->path = $path;
                        $file->save();

                        // dump($i);
                        // dump($file);
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

                        $reversedParts = explode('_', strrev($key), 2);
                        $title = count($reversedParts) > 1? strrev($reversedParts[1]) : '';
                        $num = strrev($reversedParts[0]);
                        $file_name = $key;

                        if ($title == 'proof_of_earnings' && array_key_exists($num, $people)) {
                            $document = $application->id.'_'.$title.'_'.$people[$num].'_'.$file->postname;

                            // move file
                            $path = 'uploads/applications/'.$application->id.'/'.$title.'/'.$document;
                            Storage::move($file->name, $path);
                            $file_name = $title;
                        } else {
                            $document = $application->id.'_'.$key.'_'.$file->postname;

                            // move file
                            $path = 'uploads/applications/'.$application->id.'/'.$key.'/'.$document;
                            Storage::move($file->name, $path);
                        }
                        
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
                        $file->file = $file_name;
                        $file->document = $document;
                        $file->document_type_id = $mime;
                        $file->path = $path;
                        $file->save();
                    }
                }
            }
        }
        // dd($people);

        /* if (isset($files->success)) {
            // delete temp saved files
            if ($request->tempfiles) {
                $old = (array) json_decode($request->tempfiles);
                foreach ($old as $key => $file) {
                    // Remove the file
                    unlink($file->name);
                }
            }

            // post form data
            try {
                // post data
                $data = [
                    "nis_flag" => ($request->nis !== '' && isset($request->assistance_sought[1])),
                    "declaration_flag" => isset($request->declaration_signature),
                    "file_id" => $files->success->id,
                    "application_type" => 'FORM A Employer/Employee',
                    "submission_date" => date('Y-m-d H:i:s'),
                    "source_details" => "Online Version 1.0",
                    "first_name" => $request->first_name,
                    "surname" => $request->surname,
                    "gender" => $request->gender,
                    "national_id_number" => $request->national_id,
                    "national_id_state" => $request->national_id_state,
                    "nis_number" => $request->nis,
                    "employment_classification" => employment_classification($request->employment_classification),
                    "effective_date" => $request->effective_date,
                    "effective_date_flag" => $request->effective_date >= '2020-03-01',
                    "assistance_being_sought" => [
                        "income_support_grant" => isset($request->assistance_sought[1]),
                        "rental_assistance_grant" => isset($request->assistance_sought[2]),
                        "food_card_support" => isset($request->assistance_sought[3]),
                    ],
                    "job_title" => $request->job_title,
                    "contact_number" => $request->contact_no,
                    "email" => $request->email,
                    "home_address" => $request->home_address,
                    "city_town" => $request->city_town,

                    "proof_of_citizenship " => $request->proof_of_citizenship ,
                    
                    "bank_name" => $request->bank_name,
                    "bank_branch" => $request->bank_name == 'Scotiabank'? scotia()[$request->scotia_area] : $request->bank_branch,
                    "transit_number" => $request->scotia_area,
                    "account_number" => $request->bank_account,
                    
                    "landlord_first_name" => $request->landlord_first_name,
                    "landlord_surname" => $request->landlord_surname,
                    "landlord_contact_number" => $request->landlord_contact_no,
                    "rental_amount" => $request->rental_amount,
                    
                    "employer_business_name" => $request->emp_name,
                    "employer_address" => $request->emp_address,
                    "employer_authorized_person" => $request->emp_auth_person,
                    "employer_authorized_person_contact" => $request->emp_contact,
                    
                    "household_income" => [
                        "data" => [
                            [
                                "key" => 1,
                                "first_name" => $request->first_name,
                                "surname" => $request->surname,
                                "gender" => $request->gender,
                                "relationship_to_applicant" => "Self",
                                "date_of_birth" => $request->hi_dob[1],
                                "age" => age($request->hi_dob[1]),
                                "employment_status" => $request->employment_classification,
                                "total_income" => $request->hi_income[1]? $request->hi_income[1] : '0',
                            ]
                        ],
                        "total_income_before_retrenchment" => $request->hi_total_before,
                        "household_size" => count($request->hi_income),
                    ],
                ];
                $total = $request->hi_income[1]? $request->hi_income[1] : 0;
                if ($request->hi_first_name) {
                    foreach ($request->hi_first_name as $key => $value) {
                        $data["household_income"]['data'][]= [
                            "key" => $key,
                            "first_name" => $request->hi_first_name[$key],
                            "surname" => $request->hi_surname[$key],
                            "gender" => $request->hi_gender[$key],
                            "relationship_to_applicant" => $request->hi_relationship[$key],
                            "date_of_birth" => $request->hi_dob[$key],
                            "age" => age($request->hi_dob[$key]),
                            "employment_status" => $request->hi_emp_status[$key],
                            "total_income" => $request->hi_income[$key]? $request->hi_income[$key] : '0',
                        ];
                        $total += $request->hi_income[$key];
                    }
                }
                $data["household_income"]["household_income_total"] = $total;
                $data["household_income"]["less_than_equal_10k"] = $total <= 10000;
                
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => config('curl.url.forma', ''),
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($data),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 30000,
                    CURLOPT_HTTPHEADER => [
                        "content-type: application/json",
                        "token: ".config('curl.token', ''),
                        "authorization: Bearer ".$files->success->token,
                    ],
                ]);
                
                $response = curl_exec($curl);
                $get = json_decode($response);
                curl_close($curl); 
                // dd($get->error);
                // dd($get);
                // dd($response);
                
                if (isset($get->error)) {
                    if ($get->error != '' && !is_array($get->error) && !is_object($get->error)) {
                        $validator->errors()->add('post', $get->error);
                        return redirect('/form/a')
                                ->withInput()
                                ->withErrors($validator);
                    }else{
                        $validator->errors()->add('post', 'error posting data.');
                        return redirect('/form/a')
                                ->withInput()
                                ->withErrors($validator);
                    }
                }
            } catch (\Throwable $th) {
                $validator->errors()->add('post', $th);
                return redirect('/form/a')
                        ->withInput()
                        ->withErrors($validator);
            }
        } else {
            $message = isset($files->message)? $files->message : 'Please upload files again.';
            $validator->errors()->add('uploadfail', $message);
            return redirect('/form/a')
                    ->withInput()
                    ->withErrors($validator);
        } */
        
        return redirect('/thanks')->with('success', 'Submission sent successfully.');
    }
}
