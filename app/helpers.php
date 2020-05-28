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

function cities()
{
	$list = [
		'Arima',
		'Curepe',
	];
	asort($list);
	return $list;
}

function banks()
{
	$list = [
		'First Citizens Bank',
		'Scotiabank',
		'Republic Bank',
		'Royal Bank',
		'Unit Trust',
		'JMMB',
	];
	asort($list);
	return $list;
}

function scotia()
{
	$list = [
		60525 => 'Chaguanas',
		81745 => 'Cipero & Rushworth',
		30395 => 'Couva',
		76885 => 'Cunupia',
		61705 => 'Marabella',
		46375 => 'Penal',
		59345 => 'Price Plaza',
		40485 => 'Princes Town',
		62885 => 'Rio Claro',
		60285 => 'San Fernando',
		54635 => 'Siparia',
		90415 => 'Arima',
		74625 => 'Diego Martin',
		12005 => 'Lowlands',
		95315 => 'Maraval',
		10405 => 'Park & Pembroke',
		90035 => 'Port of Spain',
		40725 => 'San Juan',
		70615 => 'Sangre Grande',
		21105 => 'Scarborough',
		74815 => 'Scotia Centre',
		18275 => 'Trincity',
		42135 => 'Tunapuna',
	];
	asort($list);
	return $list;
}

function citizen_proof()
{
	$list = [
		'National ID',
		'Certificate of Immigration Status',
		'Certificate of Residence',
		'Passport',
	];
	asort($list);
	return $list;
}