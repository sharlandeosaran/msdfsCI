<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        dd($request->all());
        // dd($request->upload1->getClientOriginalName());

        /* $formA = {
            "flag": (nis_number !== '' && public_assistance_grants),
            "file_id": `${fileID}`,
            "submission_date": Date.now().toString(),
            "name": first_name + " " + last_name,
            "gender": applicants_gender,
            "nib_number": national_insurance,
            "employment_classification": employment_classification,
            "assistance_being_sought": {
                "public_assistance_grants": public_assistance_grants,
                "food_card_support": food_card_support,
                "rental_assistance_grants": rental_assistance_grants
            },
            "job_title": job_title,
            "contact_number": contact,
            "email": email,
            "home_address": home_address,
            "name_of_bank_and_branch": name_of_bank,
            "account_number": account_number,
            "legal_name_of_business": name_of_business,
            "authorized_person": authorised_person_name,
            "authorized_person_contact": authorised_person_contact,
            "landlord_name": landlord_name,
            "landlord_contact": landlord_contact,
            "household_income": {
                "total_income_before_retrenchment": prev_total_income,
                "less_than_equal_10k": (household_total > 10000),
                "data": data
            }
        }; */

        $validator = Validator::make($request->all(), 
        [
            "name" => "required|max:150",
            "email" => "required|email|max:300",
            "phone" => "max:15",
            "submission_type" => "required|exists:submission_types,id",
            "organization" => Rule::requiredIf($request->submission_type != 1).'|max:150',

            "category" => "required|exists:category,id",
            "subcategory" => "required|array",
            "subcategory.*" => "exists:subcategory,id",
            "otherField" => "max:150",

            "subject" => "required|array",
            "subject.*" => "max:150",
            "comments" => "required|array",
            'comments.*' => 'max:5000',
            'upload' => 'array',
            'upload.*' => 'max:10000|mimes:pdf,doc,docx,txt', // 10Mb each
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
            return redirect('/wizard')
            ->withInput()
            ->withErrors($validator);
        }

        // send emails
        // dispatch(new \App\Jobs\SubmissionEmail($feedback->id));
        
        return redirect('/thanks')->with('success', 'Submission sent successfully.');
    }
}
