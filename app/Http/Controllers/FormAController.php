<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Validator;

class FormAController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'APPLICATION FORM A-EMPLOYER/EMPLOYEE',
        ];
        
        return view('form_a.wizard.wizard', $data);
    }

    public function store(Request $request)
    {
        // dd(config('curl.url.forma', ''));
        // dd($request->all());
        // dd($request->upload1->getClientOriginalName());

        $validator = Validator::make($request->all(), 
        [
            // "f_name" => "required|max:150",
            // "surname" => "required|max:150",
            // "gender" => "",
            // "contact_no" => "",
            // "email" => "required|email|max:300",
            // "home_address" => "",
            // "national_id" => "",
            // "nis" => "",
            // "emp_classification" => "",
            // "effective_date" => "",
            // "assistance_sought" => "required|array",
            // "landlord_name" => "",
            // "landlord_contact_no" => "",
            // "job_title" => "",
            // "bank_name" => "",
            // "bank_branch" => "",
            // "bank_account" => "",

            // "emp_name" => "",
            // "emp_address" => "",
            // "emp_auth_person" => "",
            // "emp_contact" => "",

            // "hi_name" => "required|array",
            // "hi_gender" => "required|array",
            // "hi_relationship" => "required|array",
            // "hi_dob" => "required|array",
            // "hi_emp_status" => "required|array",
            // "hi_income" => "required|array",
            // "hi_total_before" => "",

            // "declaration_signature" => "required",
            // // "g-recaptcha-response" => "required",

            // "signature" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "id_card_front" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "id_card_back" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "upload_name" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "proof_ownership" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "id_card_landlord" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "rental_agreement" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",
            // "rent_receipt" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",

            // "earnings_proof" => "array",
            // "earnings_proof.*" => "max:10000|mimes:pdf,doc,docx,jpg,jpeg,png",






            // "name" => "required|max:150",
            // "email" => "required|email|max:300",
            // "phone" => "max:15",
            // "submission_type" => "required|exists:submission_types,id",
            // "organization" => Rule::requiredIf($request->submission_type != 1).'|max:150',

            // "category" => "required|exists:category,id",
            // "subcategory" => "required|array",
            // "subcategory.*" => "exists:subcategory,id",
            // "otherField" => "max:150",

            // "subject" => "required|array",
            // "subject.*" => "max:150",
            // "comments" => "required|array",
            // 'comments.*' => 'max:5000',
            // 'upload' => 'array',
            // 'upload.*' => 'max:10000|mimes:pdf,doc,docx,txt', // 10Mb each    pdf, doc, docx, png, jpg and jpeg
        ],
        [
            'comments.*.max' => 'Comments cannot be more than 5000 characters long.',
            'upload.*.mimes' => 'The upload must be a PDF, Word or text document.',
        ]
        );

        // check for recaptcha
        $validator->after(function ($validator)  use ($request) 
        {

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
            return redirect('/form/a')
            ->withInput()
            ->withErrors($validator);
        }

        $data_files = [
            'form' => 'form_a',
            'national_id_front' => new \CURLFILE($_FILES['id_card_front']['tmp_name'], $_FILES['id_card_front']['type'], $_FILES['id_card_front']['name']),
            'national_id_back' => new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] ),
        ];

    	// temporarily set max execution time to 5 mins
        ini_set('max_execution_time', 300);
        
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, config('curl.url.files', ''));
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_files);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, 
        // [
        //     "content-type: multipart/form-data",
        //     // "content-type: multipart/form-data; boundary=---011000010111000001101001",
        //     "token: ".config('curl.token', ''),
        // ]);

        // $response = curl_exec($ch);
        // dd($response);


        
        
        $curl_files = curl_init();
        curl_setopt_array($curl_files, [
            CURLOPT_URL => config('curl.url.files', ''),
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data_files,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTPHEADER => [
                "content-type: multipart/form-data; boundary=---011000010111000001101001",
                "token: ".config('curl.token', ''),
            ],
        ]);
        
        $response = curl_exec($curl_files);
        $files = json_decode($response);
        // dd(curl_error($curl_files));
        curl_close($curl_files);

    	// reset max execution time to 1 min
    	ini_set('max_execution_time', 60);
        dd($response);

        if (isset($files->success)) {
            
            // post data
            $data = [
                "flag" => ($request->nis !== '' && isset($request->assistance_sought[1])),
                "file_id" => $files->success->id,
                "submission_date" => date('Y-m-d'),
                "name" => $request->f_name . " " . $request->surname,
                "gender" => $request->gender,
                "nib_number" => $request->nis,
                "employment_classification" => $request->emp_classification,
                "assistance_being_sought" => [
                    "public_assistance_grants" => isset($request->assistance_sought[1]),
                    "rental_assistance_grants" => isset($request->assistance_sought[2]),
                    "food_card_support" => isset($request->assistance_sought[3]),
                ],
                "job_title" => $request->job_title,
                "contact_number" => $request->contact_no,
                "email" => $request->email,
                "home_address" => $request->home_address,
    
                "name_of_bank_and_branch" => $request->bank_name ." ". $request->bank_branch,
                "account_number" => $request->bank_account,
    
                "legal_name_of_business" => $request->emp_name,
                "authorized_person" => $request->emp_auth_person,
                "authorized_person_contact" => $request->emp_contact,
    
                "landlord_name" => $request->landlord_name,
                "landlord_contact" => $request->landlord_contact_no,
                ];
                $total = 0;
                foreach ($request->hi_name as $key => $value) {
                    $data["household_income"][]= [
                        "household_name" => $request->hi_name[$key],
                        "household_gender" => $request->hi_gender[$key],
                        "household_relationship" => $request->hi_relationship[$key],
                        "household_dob" => $request->hi_dob[$key],
                        "household_employment_status" => $request->hi_emp_status[$key],
                        "household_income" => $request->hi_income[$key],
                    ];
                    $total += $request->hi_income[$key];
                }
                $data["total_income_before_retrenchment"] = $total;
                $data["less_than_equal_10k"] = $total > 10000;
                
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
        } else {
            dd($files->message);
        }

        
        return redirect('/thanks')->with('success', 'Submission sent successfully.');
    }
}
