<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use Validator;

class SearchController extends Controller
{
	
	public function search(Request $request){
		// if search string empty return to previous page
		if(!$request->input('string')) return back()->with('flashed', 'Search string empty');
		
		$validator = Validator::make($request->all(), [
			'string' => 'max:255',
		]);
	
		if ($validator->fails()) {
			return back()
				->withInput()
				->withErrors($validator);
		}
		$string = strtolower($request->string);
		$split = preg_split( "/(&amp;|&lt;|&gt;|\/|\?|\*|,|#|-|\.|\||\s)+/", $string);
		/*$split['string'] = $request->input('string');
		dd($split);//*/
		
		// Get results from database
		$feedback = [];
		foreach ($split as $str) {
			
			$getfeedback = \App\Feedback::all();
			foreach ($getfeedback as $row) {
				if (
					strpos(strtolower($row->name), $str) !== false ||
					strpos(strtolower($row->email), $str) !== false ||
					strpos(strtolower($row->phone), $str) !== false ||
					strpos(strtolower($row->organization), $str) !== false ||
					strpos(strtolower($row->category), $str) !== false ||
					strpos(strtolower($row->assignee), $str) !== false ||
					strpos(strtolower($row->submission_type), $str) !== false ||
					strpos(strtolower($row->status), $str) !== false ||
					strpos(strtolower($row->other_field), $str) !== false
				) $feedback[] = $row->id;

				foreach ($row->subcategories() as $key => $value) {
					if (strpos($value, $str) !== false) $feedback[] = $row->id;
				}
			}

			$getsubmissions = \App\FeedbackSubmission::all();
			foreach ($getsubmissions as $row) {
				if (
					strpos(strtolower($row->subject), $str) !== false ||
					strpos(strtolower(json_encode($row->tags)), $str) !== false ||
					strpos(strtolower($row->comments), $str) !== false
				) $feedback[] = $row->feedback_id;
			}
			// dd($feedback);				
		}
		
		$data = array(
			'title' => 'Search: '.$string,
			'string' => $string,
			'feedback' => \App\Feedback::whereIn('id', $feedback)->whereIn('category', \Auth::user()->category_id())->get(),
		);
	
        return view('admin.reports.feedback.table', $data);
	}
}
