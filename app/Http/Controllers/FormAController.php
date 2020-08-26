<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Validation\Rule;
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
            'citizen_proof' => \App\CitizenProof::all(),
            'id_state' => \App\IDState::all(),
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
            "first_name" => "required|max:50",
            "surname" => "required|max:50",
            "gender" => [
                'required',
                Rule::in(['M', 'F']),
            ],
            "contact_no" => [
                "required",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/"
            ],
            "email" => "required|email|max:250",
            "home_address" => "required|max:250",
            "city_town" => "required|max:25",
            "proof_of_citizenship" => "required|max:50",
            "national_id" => "required|regex:/^[0-9]{11}+$/",
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

            "proof_landlord_ownership" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->proof_landlord_ownership_name),
            ],
            "landlord_id_card" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->landlord_id_card_name),
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
        dd();

        // store application
        $application = new \App\Application();
        $application->ip =  $_SERVER['REMOTE_ADDR']? $_SERVER['REMOTE_ADDR'] : 'N/A';
        $application->form_id = 1;
        $application->save();

        // create form A
        $form_a = new \App\FormA();
        $form_a->application_id = $application->id;
        $form_a->disaster_id = $request->disaster;
        $form_a->disaster_other = $request->other_disaster;
        $form_a->housing_damage = $request->housing_damage;
        $form_a->housing_repairs = $request->housing_repairs;
        $form_a->insured = $request->housing_infrastructure_insured;
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
            $person->gender = $request->hi_gender[$value['key']];
            $person->primary_mobile_contact = $value['key'] == 1? $request->primary_mobile_contact : null;
            $person->email = $value['key'] == 1? $request->email : null;
            $person->national_id = $request->hi_national_id[$value['key']];
            $person->national_id_state_id = $value['key'] == 1? $request->national_id_state : null;
            $person->nis = $value['key'] == 1? $request->nis : null;

            $person->dob = $request->hi_dob[$value['key']];
            $person->employment_status_id = $value['key'] == 1? 6 : $request->hi_emp_status[$value['key']];
            $person->employment_status_other = $value['key'] == 1? $request->employment_classification : $request->hi_emp_status_other[$value['key']];
            $person->income = $request->hi_income[$value['key']];

            $person->save();

            // add person to household
            $person_household = new \App\PersonHousehold();
            $person_household->person_id = $person->id;
            $person_household->household_id = $household->id;
            $person_household->relationship_id = $request->hi_relationship[$value['key']];
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
                    $applicant = new \App\PersonBank();
                    $applicant->person_id = $person->id;
                    $applicant->bank_id = $request->bank_name;
                    $applicant->scotia_branch_id = $request->scotia_area == 0? null : $request->scotia_area;
                    $applicant->branch = $request->bank_branch;
                    $applicant->account = $request->bank_account;
                    $applicant->save();
                }
            }
        }

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
