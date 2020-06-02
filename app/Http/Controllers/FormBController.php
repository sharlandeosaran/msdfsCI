<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class FormBController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'FORM B – SELF EMPLOYED',
            'cities' => cities(),
            'banks' => banks(),
            'scotia' => scotia(),
            'citizen_proof' => citizen_proof(),
            'job_title' => job_title(),
            'form' => 'B',
        ];
        
        return view('form_b.wizard.wizard', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd(job_title_with_extra());

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
            "citizen_proof" => "required|max:50",
            "national_id" => "required|regex:/^[0-9]{11}+$/",
            "nis" => "nullable|regex:/^[0-9]{9}+$/",
            "employment_classification" => "required|max:14",
            "effective_date" => "required|date_format:Y-m-d",
            "job_title" => "nullable|max:150",
            "assistance_sought" => "required|array",
            "proof_of_citizenship" => "required",

            "assistance_sought.*" => "boolean",

            "landlord_first_name" => "max:50",
            "landlord_surname" => "max:50",
            "landlord_contact_no" => [
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}+$/"
            ],
            "rental_amount" => "",

            "bank_name" => "nullable|max:25",
            "bank_branch" => [
                'nullable',
                'max:25',
                Rule::requiredIf($request->bank_name != 'Scotiabank' && $request->bank_name),
            ],
            "scotia_area" => "nullable|numeric|required_if:bank_name,Scotiabank",
            "bank_account" => "nullable|max:15|regex:/^[0-9-]+$/|required_with:bank_name",

            "hi_name" => "array",
            "hi_gender" => "array",
            "hi_relationship" => "array",
            "hi_dob" => "required|array",
            "hi_emp_status" => "array",
            "hi_income" => "required|array",
            "hi_total_before" => "required",
            
            "hi_name.*" => "required|max:300",
            "hi_gender.*" => [
                'required',
                Rule::in(['M', 'F']),
            ],
            "hi_relationship.*" => "required|max:150",
            "hi_dob.*" => "required|date_format:Y-m-d",
            "hi_emp_status.*" => "required|max:150",
            "hi_income.1" => "required",
            "hi_income.*" => "",

            "recommender_first_name" => "required",
            "recommender_surname" => "required",
            "recommender_gender" => [
                'required',
                Rule::in(['M', 'F']),
            ],
            "recommender_job_title" => "required",
            "recommender_contact_no" => [
                "required",
                "regex:/^[0-9]{3}-[0-9]{4}|[0-9]{7}|[0-9]{10}|\([0-9]{3}\)[0-9]{3}-[0-9]{4}|\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}+$/"
            ],
            "recommender_email" => "nullable|email",
            "recommender_home_address" => "required",
            "recommender_city_town" => "required",
            "recommender_years_known" => "required|numeric",
            "recommender_job_title_info" => [
                'nullable',
                'max:50',
                Rule::requiredIf(in_array($request->recommender_job_title, job_title_with_extra())),
            ],

            "declaration_signature" => "required",
            // "g-recaptcha-response" => "required",

            "signature" => "required|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "id_card_front" => "required|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "id_card_back" => "required|max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            "cert_residence" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "proof_affected_income" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "proof_ownership" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "id_card_landlord" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "rental_agreement" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "rent_receipt" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            "recommendation" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            "proof_of_earnings" => "array",
            "proof_of_earnings.*" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
        ],
        [
            'hi_total_before.required' => 'The total income before reduction field is required.',
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

            'upload.*.mimes' => 'The upload must be a PDF, Word, text document, PNG or JPEG.',
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
            $chk = false;
            $folder = md5($request->first_name).msTimeStamp();
            foreach ($_FILES as $name => $file) {
                if ($file['name'] != '' && $request->file($name) && $request->file($name)->isValid()) {    
                    $request->file($name)->storeAs('public/uploads/'.$folder, $request->file($name)->getClientOriginalName());
                    $chk = true;
                }
            }
            // dd($_FILES);

            if ($chk) {
                return redirect('/form/b')
                ->withInput()
                ->withErrors($validator)
                ->with('folder', $folder)
                ;
            } else {
                return redirect('/form/b')
                ->withInput()
                ->withErrors($validator)
                ;
            }
        }

        $data_files = [
            'form' => 'form_b',

            'user_signiture' => new \CURLFILE($_FILES['signature']['tmp_name'], $_FILES['signature']['type'], $_FILES['signature']['name']),
            'national_id_front' => new \CURLFILE($_FILES['id_card_front']['tmp_name'], $_FILES['id_card_front']['type'], $_FILES['id_card_front']['name']),
            'national_id_back' => new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] ),
            
            // 'cert_non_nationals_registration_doc' => new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] ),

            // // form b
            // 'cert_registration_business_owners_doc' => new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] ),
            // 'recommendation' => new \CURLFILE($_FILES['recommendation']['tmp_name'], $_FILES['recommendation']['type'], $_FILES['recommendation']['name'] ),

            // 'rental_agreement' => new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] ),
            // 'most_recent_landperson_payment' => new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] ),
            // 'copy_of_landperson_id' => new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] ),

            // // 'declaration_truth' => new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] ),
        ];
        // dd($_FILES[ 'proof_of_earnings' ][ 'tmp_name' ]);

        if ($request->proof_of_earnings) {
            foreach ($request->proof_of_earnings as $key => $value) {
                if( !empty( $_FILES['proof_of_earnings']['tmp_name'][$key] ) && is_uploaded_file( $_FILES['proof_of_earnings']['tmp_name'][$key] ) ) 
                $data_files['proof_of_earnings'][$key] = new \CURLFILE($_FILES['proof_of_earnings']['tmp_name'][$key], $_FILES['proof_of_earnings']['type'][$key], $_FILES['proof_of_earnings']['name'][$key] );
            }
        }
        
        dd(json_encode($data_files));
        dd($data_files);

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
        // dd($files);

    	// reset max execution time to 1 min
    	ini_set('max_execution_time', 60);

        if (isset($files->success)) {
            try {
                // post data
                $data = [
                    "flag" => ($request->nis !== '' && isset($request->assistance_sought[1])),
                    "file_id" => $files->success->id,
                    "application_type" => 'FORM B Self Employed',
                    "submission_date" => date('Y-m-d'),
                    "first_name" => $request->first_name,
                    "surname" => $request->surname,
                    "gender" => $request->gender,
                    "national_id_number" => $request->national_id,
                    "nib_number" => $request->nis,
                    "employment_classification" => $request->employment_classification,
                    "effective_date" => $request->effective_date,
                    "assistance_being_sought" => [
                        "public_assistance_grants" => isset($request->assistance_sought[1]),
                        "rental_assistance_grants" => isset($request->assistance_sought[2]),
                        "food_card_support" => isset($request->assistance_sought[3]),
                    ],
                    "job_title" => $request->job_title,
                    "contact_number" => $request->contact_no,
                    "email" => $request->email,
                    "home_address" => $request->home_address,
                    "city_town" => $request->city_town,

                    "proof_of_citizenship " => $request->proof_of_citizenship ,
                    
                    "bank_name" => $request->bank_name,
                    "bank_branch" => $request->bank_name == 'Scotiabank'? scotia($request->scotia_area) : $request->bank_branch,
                    "transit_number" => $request->scotia_area,
                    "account_number" => $request->bank_account,
                    
                    "landlord_first_name" => $request->landlord_first_name,
                    "landlord_surname" => $request->landlord_surname,
                    "landlord_contact" => $request->landlord_contact_no,
                    "rental_amount" => $request->rental_amount,
                    
                    "household_income" => [
                        "total_income_before_retrenchment" => $request->hi_total_before,
                    ],

                    "recommender_first_name" => $request->recommender_first_name,
                    "recommender_surname" => $request->recommender_surname,
                    "recommender_gender" => $request->recommender_gender,
                    "recommender_job_title" => $request->recommender_job_title,
                    "recommender_contact_number" => $request->recommender_contact_no,
                    "recommender_email" => $request->recommender_email,
                    "recommender_home_address" => $request->recommender_home_address,
                    "recommender_city_town" => $request->recommender_city_town,
                    "recommender_years_know_applicant" => $request->recommender_years_known,
                    // "recommender_certification" => $request->landlord_name, // ******** what is this???
                ];
                $total = $request->hi_income[1];
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
                $data["household_income"]["less_than_equal_10k"] = $total <= 10000;

                dd(json_encode($data));
                // dd($data);
                
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => config('curl.url.formb', ''),
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
                    return redirect('/form/b')
                            ->withInput()
                            ->withErrors($validator);
                }
            } catch (\Throwable $th) {
                $validator->errors()->add('post', $th);
                return redirect('/form/b')
                        ->withInput()
                        ->withErrors($validator);
            }
            // dd($response);
        } else {
            $validator->errors()->add('post', 'Could not upload files.');
            return redirect('/form/b')
                    ->withInput()
                    ->withErrors($validator);
        }
        
        return redirect('/thanks')->with('success', 'Submission sent successfully.');
    }
}
