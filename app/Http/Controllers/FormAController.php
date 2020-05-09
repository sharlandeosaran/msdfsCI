<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormAController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Form A',
        ];
        
        return view('form_a.form', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());
        // dd($request->upload1->getClientOriginalName());

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
            if($request->subcategory){
                foreach ($request->subcategory as $key => $value) {
                    if (!$request->comments[$value]) $validator->errors()->add('comments.'.$value, 'Comments cannot be empty.');
                    if (!$request->subject[$value]) $validator->errors()->add('subject.'.$value, 'Subject cannot be empty.');
                }

                if (in_array('0', $request->subcategory) && !$request->otherField) $validator->errors()->add('otherField', 'The other field field is required with sub-category Other.');
            }

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
        });
        
        if ($validator->fails()) {
            return redirect('/wizard')
            ->withInput()
            ->withErrors($validator);
        }

        // new feedback
        $feedback = new \App\Feedback();
        $feedback->ip =  $_SERVER['REMOTE_ADDR']? $_SERVER['REMOTE_ADDR'] : 'N/A';
        $feedback->name = $request->name;
        $feedback->submission_type = $request->submission_type;
        $feedback->organization = $request->organization;
        $feedback->phone = $request->phone;
        $feedback->email = $request->email;
        $feedback->category = $request->category;
        $feedback->other_field = $request->otherField;
        $feedback->save();

        foreach ($request->subcategory as $key => $value) {
            $subcat = new \App\FeedbackSubCategory;
            $subcat->feedback_id = $feedback->id;
            $subcat->subcategory_id = $value;
            $subcat->save();
            
            // submissions
            $sub = new \App\FeedbackSubmission;
            $sub->feedback_id = $feedback->id;
            $sub->subject = sanitize($request->subject[$value]);
            $sub->comments = sanitize($request->comments[$value]);
            $sub->save();
            
            // documents upload
            if (isset($request->upload[$value])) {
                if ($request->file('upload.'.$value)->isValid()) {
                    $types = ['application/msword', 'text/plain', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                    $type = $request->upload[$value]->getMimeType();
                    
                    if (in_array($type, $types)) {
                        $upload = $sub->id.'_'.$request->upload[$value]->getClientOriginalName();
                        // upload upload
                        $request->upload[$value]->storeAs('public/uploads/'.$feedback->id, $upload);
                        // save name to feedback
                        $sub->upload = $upload;
                        $sub->upload_type = $type;
                        $sub->save();
                    }
                }
            }
        }

        // send emails
        dispatch(new \App\Jobs\SubmissionEmail($feedback->id));

        // update admin dashboard data
        dispatch(new \App\Jobs\UpdateDashboardData());
        
        return redirect('/thanks')->with('success', 'Submission sent successfully.');
    }
}
