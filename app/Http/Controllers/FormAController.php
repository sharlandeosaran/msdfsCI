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
            'cities' => cities(),
            'banks' => banks(),
            'scotia' => scotia(),
            'citizen_proof' => citizen_proof(),
            'id_state' => id_state(),
            'job_title' => job_title(),
            'form' => 'A',
        ];
        
        return view('form_a.wizard.wizard', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->upload1->getClientOriginalName());

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
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}+$/"
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
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}+$/",
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
                Rule::requiredIf($request->bank_name != 'Scotiabank' && $request->bank_name),
            ],
            "scotia_area" => "nullable|numeric|required_if:bank_name,Scotiabank",
            "bank_account" => "nullable|max:15|regex:/^[0-9-]+$/|required_with:bank_name",

            "emp_name" => "required|max:100",
            "emp_address" => "required|max:250",
            "emp_auth_person" => "required|max:100",
            "emp_contact" => [
                "required",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}+$/"
            ],

            "hi_name" => "array",
            "hi_gender" => "array",
            "hi_relationship" => "array",
            "hi_dob" => "required|array",
            "hi_emp_status" => "array",
            "hi_income" => "required|array",
            "hi_total_before" => "required|numeric|min:0",
            
            "hi_name.*" => "required|max:100",
            "hi_gender.*" => [
                'required',
                Rule::in(['M', 'F']),
            ],
            "hi_relationship.*" => "required|max:25",
            "hi_dob.*" => "required|date_format:Y-m-d",
            "hi_emp_status.*" => "required|max:25",
            "hi_income.1" => "required",
            "hi_income.*" => "nullable|numeric|min:0",

            "declaration_signature" => "required",
            // "g-recaptcha-response" => "required",

            "signature" => "required|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "employer_recommender_letter" => "required|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            "id_card_front" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->national_id_state == 'Have identification'),
                Rule::requiredIf($request->proof_of_citizenship == 'National ID'),
            ],
            "id_card_back" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->national_id_state == 'Have identification'),
                Rule::requiredIf($request->proof_of_citizenship == 'National ID'),
            ],

            "lost_id_police_report" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->national_id_state == 'Lost but have police report'),
            ],
            "ebc_id_letter" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->national_id_state == 'Have EBC letter'),
            ],

            "cert_immigration_status" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->proof_of_citizenship == 'Certificate of Immigration Status'),
            ],
            "cert_residence" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->proof_of_citizenship == 'Certificate of Residence'),
            ],

            "passport_bio" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->proof_of_citizenship == 'Passport'),
            ],
            "passport_stamp" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->proof_of_citizenship == 'Passport'),
            ],

            "proof_landlord_ownership" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought)),
            ],
            "landlord_id_card" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought)),
            ],
            "rental_agreement" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought)),
            ],
            "rent_receipt" => [
                'nullable',
                'max:10000',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                Rule::requiredIf($request->assistance_sought && array_key_exists(2, $request->assistance_sought)),
            ],

            "proof_of_earnings" => "array",
            "proof_of_earnings.*" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
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
            'hi_name.*.required' => 'The household occupant name field is required.',
            'hi_income.1.required' => 'The applicant total income field is required.',

            'effective_date.date_format' => 'The effective date does not match the format yyyy-mm-dd.',
            'contact_no.regex' => 'The format for the contact number is xxx-xxxx.',
            'nis.regex' => 'The format for the national insurance number is xxxxxxxxx (9 digits).',
            'national_id.regex' => 'The format for the national id is xxxxxxxxxxx (11 digits).',

            'scotia_area.required_if' => 'The branch area field is required when bank name is Scotiabank.',
            'bank_branch.required' => 'The bank branch field is required when bank name is present.',

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

			/* $url = 'https://www.google.com/recaptcha/api/siteverify';
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
            } */
        });
        
        if ($validator->fails()) {
            $uploads = app('App\Http\Controllers\FileController')->store($request);

            // dd($uploads);
            // dd($_FILES);

            if ($uploads && $uploads['response'] && $request->tempfiles) {
                $old = (array) json_decode($request->tempfiles);
                $new = (array) json_decode($uploads['list']);
                $merge = array_merge($old,$new);

                // dump($request->tempfiles);
                // dump($old);
                // dump($uploads['list']);
                // dump($new);
                // dd(array_merge($old,$new));
                // die();

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

        $data_files = ['form' => 'form_a',];

        if ($request->signature) $data_files['user_signiture'] = new \CURLFILE($_FILES['signature']['tmp_name'], $_FILES['signature']['type'], $_FILES['signature']['name']);
        // if ($request->signature) $data_files['signature'] = new \CURLFILE($_FILES['signature']['tmp_name'], $_FILES['signature']['type'], $_FILES['signature']['name']);
        if ($request->employer_recommender_letter) $data_files['employer_recommender_letter'] = new \CURLFILE($_FILES['employer_recommender_letter']['tmp_name'], $_FILES['employer_recommender_letter']['type'], $_FILES['employer_recommender_letter']['name']);

        if ($request->id_card_front) $data_files['national_id_front'] = new \CURLFILE($_FILES['id_card_front']['tmp_name'], $_FILES['id_card_front']['type'], $_FILES['id_card_front']['name']);
        // if ($request->id_card_front) $data_files['id_card_front'] = new \CURLFILE($_FILES['id_card_front']['tmp_name'], $_FILES['id_card_front']['type'], $_FILES['id_card_front']['name']);
        if ($request->id_card_back) $data_files['national_id_back'] = new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] );
        // if ($request->id_card_back) $data_files['id_card_back'] = new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] );

        if ($request->lost_id_police_report) $data_files['lost_id_police_report'] = new \CURLFILE($_FILES['lost_id_police_report']['tmp_name'], $_FILES['lost_id_police_report']['type'], $_FILES['lost_id_police_report']['name'] );
        if ($request->ebc_id_letter) $data_files['ebc_id_letter'] = new \CURLFILE($_FILES['ebc_id_letter']['tmp_name'], $_FILES['ebc_id_letter']['type'], $_FILES['ebc_id_letter']['name'] );

        if ($request->cert_immigration_status) $data_files['cert_immigration_status'] = new \CURLFILE($_FILES['cert_immigration_status']['tmp_name'], $_FILES['cert_immigration_status']['type'], $_FILES['cert_immigration_status']['name'] );
        if ($request->cert_residence) $data_files['cert_residence'] = new \CURLFILE($_FILES['cert_residence']['tmp_name'], $_FILES['cert_residence']['type'], $_FILES['cert_residence']['name'] );

        if ($request->passport_bio) $data_files['passport_bio'] = new \CURLFILE($_FILES['passport_bio']['tmp_name'], $_FILES['passport_bio']['type'], $_FILES['passport_bio']['name'] );
        if ($request->passport_stamp) $data_files['passport_stamp'] = new \CURLFILE($_FILES['passport_stamp']['tmp_name'], $_FILES['passport_stamp']['type'], $_FILES['passport_stamp']['name'] );

        if ($request->proof_landlord_ownership) $data_files['proof_landlord_ownership'] = new \CURLFILE($_FILES['proof_landlord_ownership']['tmp_name'], $_FILES['proof_landlord_ownership']['type'], $_FILES['proof_landlord_ownership']['name'] );
        if ($request->landlord_id_card) $data_files['landlord_id_card'] = new \CURLFILE($_FILES['landlord_id_card']['tmp_name'], $_FILES['landlord_id_card']['type'], $_FILES['landlord_id_card']['name'] );
        if ($request->rental_agreement) $data_files['rental_agreement'] = new \CURLFILE($_FILES['rental_agreement']['tmp_name'], $_FILES['rental_agreement']['type'], $_FILES['rental_agreement']['name'] );
        if ($request->rent_receipt) $data_files['rent_receipt'] = new \CURLFILE($_FILES['rent_receipt']['tmp_name'], $_FILES['rent_receipt']['type'], $_FILES['rent_receipt']['name'] );

        if ($request->proof_of_earnings) {
            foreach ($request->proof_of_earnings as $key => $value) {
                if( !empty( $_FILES['proof_of_earnings']['tmp_name'][$key] ) && is_uploaded_file( $_FILES['proof_of_earnings']['tmp_name'][$key] ) ) 
                $data_files['proof_of_earnings'][$key] = new \CURLFILE($_FILES['proof_of_earnings']['tmp_name'][$key], $_FILES['proof_of_earnings']['type'][$key], $_FILES['proof_of_earnings']['name'][$key] );
            }
        }
                
        // dd(json_encode($data_files, JSON_PRETTY_PRINT));
        // dd($data_files);

        if ($request->tempfiles) {
            $old = (array) json_decode($request->tempfiles);
            // dump($old);
            foreach ($old as $key => $file) {
                // dump($file);
                $data_files[$key] = curl_file_create($file->name, $file->mime, $file->mime);
                $data_files['user_signiture'] = curl_file_create($file->name, $file->mime, $file->mime);
            }
        }

    	// temporarily set max execution time to 5 mins
        ini_set('max_execution_time', 300);
        
        $curl_files = curl_init();
        curl_setopt_array($curl_files, [
            CURLOPT_URL => config('curl.url.files', ''),
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data_files,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "content-type: multipart/form-data",
                "token: ".config('curl.token', ''),
            ],
        ]);
        
        $response = curl_exec($curl_files);
        $files = json_decode($response);
        curl_close($curl_files);
        // dd($response);
        // dd($files);

    	// reset max execution time to 1 min
    	ini_set('max_execution_time', 60);

        if (isset($files->success)) {
            // delete temp saved files
            if ($request->tempfiles) {
                $old = (array) json_decode($request->tempfiles);
                // dump($old);
                foreach ($old as $key => $file) {
                    // dd($file['name']);
                    
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
                    "landlord_contact" => $request->landlord_contact_no,
                    "rental_amount" => $request->rental_amount,
                    
                    "employer_business_name" => $request->emp_name,
                    "employer_address" => $request->emp_address,
                    "employer_authorized_person" => $request->emp_auth_person,
                    "employer_authorized_person_contact" => $request->emp_contact,
                    
                    "household_income" => [
                        "data" => [
                            1 => [
                                "name" => $request->first_name.' '.$request->surname,
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
                if ($request->hi_name) {
                    foreach ($request->hi_name as $key => $value) {
                        $data["household_income"]['data'][]= [
                            "name" => $request->hi_name[$key],
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
                
                // dd(json_encode($data, JSON_PRETTY_PRINT));
                // dd($data);
                
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
                // dd($response);
                
                if (isset($get->error)) {
                    $validator->errors()->add('post', $get->error);
                    return redirect('/form/a')
                            ->withInput()
                            ->withErrors($validator);
                }
            } catch (\Throwable $th) {
                $validator->errors()->add('post', $th);
                return redirect('/form/a')
                        ->withInput()
                        ->withErrors($validator);
            }
            // dd($response);
        } else {
            $validator->errors()->add('uploadfail', 'Please upload files again.');
            return redirect('/form/a')
                    ->withInput()
                    ->withErrors($validator);
        }
        
        return redirect('/thanks')->with('success', 'Submission sent successfully.');
    }
}
