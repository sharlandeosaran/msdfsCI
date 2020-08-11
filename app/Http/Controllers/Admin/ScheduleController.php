<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ScheduleController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'New Schedule',
			'active' => 'schedule',
            'applications' => \App\Application::schedule(),
        ];

        return view('admin.schedule.schedule', $data);
    }

    public function report(Request $request)
    {
        // dd($request->all());
        // dd($request->upload1->getClientOriginalName());

        $validator = Validator::make($request->all(), 
        [
            "categories" => "required",
        ]
        );
        
        if ($validator->fails()) {
            return redirect('/admin/reports/category')
            ->withInput()
            ->withErrors($validator);
        }

        if(is_string($request->categories)){
            $bad = array("[", "]");
            $safe = array('', '');
            $request->categories = str_replace($bad,$safe,$request->categories);
        }
        $cats = explode(',', $request->categories);
        // dd($cats);
        
        $data = [
            'title' => 'Submissions By Category',
			'active' => 'reports',
            'activelink' => 'reportbycategory',
            'feedback' => \App\Feedback::whereIn('category', $cats)->whereNotIn('status_id', [5])->get(),
        ];

        return view('admin.reports.feedback.table', $data);
    }
}
