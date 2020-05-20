<?php

function version()
{
	return 'Version 0.1';
}

function sanitize($input) { 
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