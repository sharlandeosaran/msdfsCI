<?php

function version()
{
	return 'Version 0.1.0';
}

function support_email()
{
	return 'support@gov.tt';
}

function sanitize($input) 
{ 
	if(is_string($input)){
		$bad = array("'", '"', '`', '/');
		$safe = array('&#039;', '&quot;', '&#96;', '&#47;');
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
		$input = str_replace($bad,$safe,$input);
		return $input;
	}else{
		return $input; 
	}
}

function number_short($num)
{
	if (is_numeric ($num)) {
		if ($num < 1000) {
			return number_format($num);
		}else if ($num < 1000000) {
			$num /= 1000;
			return number_format($num).'K';
		}else if ($num < 1000000000) {
			$num /= 1000000;
			return number_format($num).'M';
		}else if ($num < 1000000000000) {
			$num /= 1000000000;
			return number_format($num).'B';
		}else if ($num < 1000000000000000) {
			$num /= 1000000000000;
			return number_format($num).'T';
		}else{
			return 0;
		}
		
	}else {
		return $num;
	}
}

function age($dob)
{
	return \Carbon\Carbon::parse($dob)->age;
}

function msTimeStamp()
{
	return (string)round(microtime(1) * 1000);
}

function dashboard_sort_categories($a, $b) 
{
    return $b->count - $a->count;
}

function reference_number()
{
	$year = date('Y');
	
	// get last entry for the year
	$application = \App\Application::where('reference_number', 'LIKE', '%/'.$year)->orderBy('id', 'desc')->first();
	if ($application) {
		$nums = explode('/', $application->reference_number);
		$num = $nums[1] + 1;
		return $application->applicant->letter .'/'. str_pad($num, 3, '0', STR_PAD_LEFT) .'/'. $year;
	} else {
		return '#/###/'.$year;
	}
}

function search_for_title($id, $array) 
{
	foreach ($array as $key => $val) {
		if ($val['title'] == $id) {
			return $key;
		}
	}
	return null;
}