<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class CriticalIncidentController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Critical Incident Form',
            'communities' => \App\Community::all(),
            'id_state' => \App\IDState::ordered(),
            'items_lost_or_damaged' => \App\ItemsLostOrDamaged::all(),
            'disasters' => \App\Disaster::all(),
            'housing_type' => \App\HousingType::all(),
            'total_income' => \App\TotalIncome::ordered(),
            'relationships' => \App\Relationship::all(),
            'employment_status' => \App\EmploymentStatus::ordered(),
            'marital_status' => \App\MaritalStatus::ordered(),
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
            "first_name" => "required|max:150",
            "surname" => "required|max:150",
            "othername" => "required|max:150",
            "gender" => [
                'required',
                Rule::in(['M', 'F']),
            ],
            "email" => "required|email|max:250",
            "marital_status" => "required|exists:marital_status,id",
            "national_id" => "required|regex:/^[0-9]{11}+$/",
            "national_id_state" => "required|exists:id_states,id",
            "drivers_permit" => "nullable|max:150",
            "passport" => "nullable|max:150",
            "housing_type" => "required|exists:housing_types,id",

            "landlord_first_name" => [
                "nullable",
                "max:150",
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought)),
            ],
            "landlord_surname" => [
                "nullable",
                "max:150",
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
            
            "home_address" => "required|max:250",
            "city_town" => "required|max:25",
            "primary_mobile_contact" => [
                "required",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/",
            ],
            "secondary_mobile_contact" => [
                "required",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/",
            ],
            "land_line_telephone_contact" => [
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
            "hi_national_id" => "array",
            "hi_total_income" => "required|numeric|min:0",
            
            "hi_first_name.*" => "required|max:100",
            "hi_surname.*" => "required|max:100",
            "hi_gender.*" => [
                'required',
                Rule::in(['M', 'F']),
            ],
            "hi_relationship.*" => "required|max:25",
            "hi_relationship_other.*" => "required|max:25",
            "hi_dob.*" => "required|date_format:Y-m-d",
            "hi_emp_status.*" => "required|exists:employment_status,id",
            "hi_emp_status_other.*" => "required|max:25",
            "hi_national_id.*" => "required|max:25",            

            "disaster" => "required|max:150",
            "other_disaster" => "nullable|max:150",
            "housing_damage" => [
                'required',
                Rule::in(['Y', 'N']),
            ],
            "housing_repairs" => "required|max:250",
            "insurer_name" => "nullable|max:250",
            "insurer_address" => "nullable|max:250",
            "insurer_contact" => [
                "nullable",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}|\+1\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}|\+1\([0-9]{3}\)[0-9]{7}|\+1[0-9]{10}+$/",
            ],
            "items_lost_or_damaged" => "array",
            "recovery_needs" => "array",

            "items_lost_or_damaged.*" => "nullable|exists:items_lost_or_damaged,id",            
            "recovery_needs.*" => "nullable|max:25", 

            "declaration_signature" => "required",
            // "g-recaptcha-response" => "required",

            // uploaded files
            "signature" => "required_without:signature_name|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "employer_recommender_letter" => "required_without:employer_recommender_letter_name|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            // "id_card_front" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf(($request->national_id_state == 'Have identification' || $request->proof_of_citizenship == 'National ID') && !$request->id_card_front_name),
            // ],
            // "id_card_back" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf(($request->national_id_state == 'Have identification' || $request->proof_of_citizenship == 'National ID') && !$request->id_card_back_name),
            // ],

            // "lost_id_police_report" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->national_id_state == 'Lost but have police report' && !$request->lost_id_police_report_name),
            // ],
            // "ebc_id_letter" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->national_id_state == 'Have EBC letter' && !$request->ebc_id_letter_name),
            // ],

            // "cert_immigration_status" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->proof_of_citizenship == 'Certificate of Immigration Status' && !$request->cert_immigration_status_name),
            // ],
            // "cert_residence" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->proof_of_citizenship == 'Certificate of Residence' && !$request->cert_residence_name),
            // ],

            // "passport_bio" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->proof_of_citizenship == 'Passport' && !$request->passport_bio_name),
            // ],
            // "passport_stamp" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->proof_of_citizenship == 'Passport' && !$request->passport_stamp_name),
            // ],

            // "proof_landlord_ownership" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->proof_landlord_ownership_name),
            // ],
            // "landlord_id_card" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->landlord_id_card_name),
            // ],
            // "rental_agreement" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->rental_agreement_name),
            // ],
            // "rent_receipt" => [
            //     'nullable',
            //     'max:10000',
            //     'mimes:pdf,doc,docx,jpg,jpeg,png',
            //     Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought) && !$request->rent_receipt_name),
            // ],

            // "cert_incorporation_registration" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "recommendation_letter" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            // "proof_of_earnings" => "array",
            // "proof_of_earnings.*" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
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
            'hi_first_name.*.required' => 'The household occupant first name field is required.',
            'hi_surname.*.required' => 'The household occupant surname field is required.',
            'hi_total_income.1.required' => 'The applicant total income field is required.',

            'effective_date.date_format' => 'The effective date does not match the format yyyy-mm-dd.',
            'contact_no.regex' => 'The format for the contact number is (xxx) xxx-xxxx.',
            'landlord_contact_no.regex' => 'The format for the contact number is (xxx) xxx-xxxx.',
            'recommender_contact_no.regex' => 'The format for the contact number is (xxx) xxx-xxxx.',
            'nis.regex' => 'The format for the national insurance number is xxxxxxxxx (9 digits).',
            'national_id.regex' => 'The format for the national id is xxxxxxxxxxx (11 digits).',

            'scotia_area.required_if' => 'The branch area field is required when bank name is Scotiabank.',
            'bank_branch.required' => 'The bank branch field is required when bank name is present.',
            
            'signature.required_without' => 'The signature field is required.',
            'employer_recommender_letter.required_without' => 'The employer recommender letter field is required.',

            '*.mimes' => 'The upload must be a PDF, Word document, PNG or JPEG.',
        ]
        );
        
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
            if (\App::environment('production')) {
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
        
        
        return redirect('/thanks')->with('success', 'Submission sent successfully.');
    }
}
