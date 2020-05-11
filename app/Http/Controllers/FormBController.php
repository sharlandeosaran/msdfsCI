<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FormBController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'FORM B – SELF EMPLOYED',
        ];
        
        return view('form_b.wizard.wizard', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());
        // dd($request->upload1->getClientOriginalName());

        /* $formB = {
            "flag": false,
            "file_id": `${fileID}`,
            "submission_date": `${Date.now()}`,
            "first_name": this.state.first_name,
            "surname": this.state.last_name,
            "gender": this.state.applicants_gender,
            "national_id": this.state.national_id,
            "nib_number": this.state.national_insurance,
            "job_title": this.state.job_title,
            "employment_classification": {
                "loss_of_income": (this.state.employment_classification === "Loss of Income"),
                "reduced_income": (this.state.employment_classification === "Reduced Income"),
                "effective_date": this.state.effective_date,
            },
            "assistance_being_sought": {
                "public_assistance_grants": this.state.public_assistance_grants,
                "food_card_support": this.state.food_card_support,
                "rental_assistance_grants": this.state.rental_assistance_grants
            },
            "contact_number": this.state.contact,
            "email_address": this.state.email,
            "home_address": this.state.home_address,
            "name_of_bank_and_branch": this.state.name_of_bank,
            "account_number": this.state.account_number,
            "landlord_name": this.state.landlord_name,
            "landlord_contact": this.state.landlord_contact,
            "household_income": {
                "data": data,
                "less_than_equal_10k": (household_total <= 10000),
            },
            "recommender": {
                "name": this.state.recommender_one_name,
                "gender": this.state.recommender_one_gender,
                "job_title": this.state.recommender_one_job_title,
                "contact_number": this.state.recommender_one_contact,
                "email": this.state.recommender_one_email,
                "home_address": this.state.recommender_one_home_address,
                "recommender_certification": this.state.recommender_one_certification,
                "yearsKnown": this.state.years_known
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
