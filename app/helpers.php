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

function msTimeStamp()
{
	return (string)round(microtime(1) * 1000);
}

function cities()
{
	$list = [
		'Aranguez', 
		'Arima',
		'Arena',
		'Arnos Vale',
		'Arouca',
		'Arquart Village',
		'Auchenskeoch', 
		'Auzonville',
		'Avocat', 
		'Bacolet',
		'Balmain',
		'Bamboo(#1 & #3)', 
		'Bamboo #2', 
		'Bangladesh', 
		'Barataria',
		'Barrackpore',
		'Basta Hall',
		'Beetham Estate Gardens',
		'Bethel',
		'Belle Garden',
		'Belmont',
		'Ben Lomond',
		'Biche',
		'Black Rock',
		'Blanchisseuse',
		'Boissiere Village',
		'Bon Accord',
		'Bonne Aventure',
		'Bonasse',
		'Borde Narve Village',
		'Bourg Mulatresse',
		'Brasso',
		'Brasso Seco',
		'Brazil',
		'Brickfield',
		'Brighton',
		'Buccoo',
		'Buen Intento Village',
		'Buenos Ayres',
		'Caigual',
		'Calcutta Settlement',
		'Calder Hall',
		'California',
		'Canaan, Tobago',
		'Canaan, Trinidad',
		'Cantaro',
		'Carapichaima',
		'Carenage',
		'Carli Bay',
		'Carlsen Field',
		'Carnbee',
		'Cascade',
		'Castara',
		'Caura',
		'Cedar Hill Village',
		'Cedros',
		'Centeno',
		'Chaguanas',
		'Chaguaramas',
		'Champs Fleurs',
		'Chandernagore Village',
		'Charlotteville',
		'Charuma',
		'Chase Village',
		'Chatham',
		'Churkoo Village',
		'Claxton Bay',
		'Cocorite',
		'Cocoyea Village',
		'Congo Village ',
		'Coryal',
		'Couva',
		'Culloden',
		'Cumaca',
		'Cumuto',
		'Cunupia',
		'Curepe',
		'Cushe',
		"D'Abadie",
		'Debe',
		'Delaford',
		'Diamond Village',
		'Dibe',
		'Diego Martin',
		'Dinsley',
		'Dow Village, California',
		'Dow Village, Siparia',
		'Duncan Village',
		'Ecclesville',
		'Eckel Village',
		'Edinburgh',
		'El Dorado',
		'El Socorro',
		'Enterprise',
		'Endeavour',
		'Erin',
		'Exchange',
		'Febeau Village',
		'Felicity',
		'Fifth Company',
		'Fishing Pond',
		'Flanigin Town',
		'Freeport',
		'Forres Park',
		'Four Roads',
		'Frederick Settlement',
		'Friendship Village',
		'Fullarton',
		'Fyzabad',
		'Gasparillo',
		'Glamorgan',
		'Glencoe',
		'Golconda',
		'Gonzales',
		'Gopaul Lands',
		'Goodwood',
		'Goodwood Park',
		'Gran Couva',
		'Grande Riviere',
		'Guaico',
		'Guanapo',
		'Guapo',
		'Guayaguayare',
		'Gulf View',
		'Hardbargain',
		'Hindustan',
		'Hope',
		'Icacos',
		'Iere Village',
		'Indian Chain',
		'Indian Walk',
		'Jerningham Junction',
		'John Dial',
		'John John',
		'Jordan Hill',
		'Kelly Village',
		'Kernaham',
		'Kumar Village',
		"L'Anse Fourmi",
		"L'Anse Mitan",
		'La Brea',
		'La Canoa',
		'La Horquetta',
		'La Paille',
		'La Romaine',
		'Las Lomas',
		'Lambeau, Tobago',
		'Las Cuevas',
		'Laventille',
		'Lengua',
		'Les Coteaux',
		'Longdenville',
		'Lopinot',
		'Los Bajos',
		"Louis D'Or",
		'Lowlands',
		'Macoya',
		'Madras Settlement',
		'Mairao Village',
		'Malabar',
		'Malick',
		'Manzanilla',
		'Marabella',
		'Maracas',
		'Maraval',
		'Mason Hall',
		'Matelot',
		'Matura',
		'Mausica',
		'Mayaro',
		'Mayo',
		'Mc Bean',
		'Mohammedville',
		'Mon Repos',
		'Montrose',
		'Monkey Town ',
		'Montserrat',
		'Moriah',
		'Morne Diablo',
		'Morne Quinton',
		'Moruga',
		'Morvant',
		"Mount D'Or",
		'Mount Lambert',
		'Mount Saint George',
		'Mount Stewart',
		'Mucurapo',
		'Navet',
		'New Grant',
		"O'Meara",
		'Orange Hill',
		'Orange Valley',
		'Oropune Village',
		'Oropouche',
		'Otaheite',
		'Palmyra ',
		'Palo Seco',
		'Patna Village ',
		'Pembroke',
		'Penal',
		'Penal Rock ',
		'Petit Trou',
		'Petit Valley',
		'Phoenix Park',
		'Piarco',
		'Pierreville',
		'Piparo',
		'Plaisance',
		'Plaisance Park',
		'Plymouth',
		'Point Fortin',
		'Point Lisas',
		'Pointe-à-Pierre',
		'Poole',
		'Port of Spain',
		'Preysal',
		'Princes Town',
		'Quarry Village ',
		'Quinam',
		'Rockly Vale',
		'Rampanalgas',
		'Rancho Quemado',
		'Ravin Anglais',
		'Redhead',
		'Rio Claro',
		'Roussillac',
		'Roxborough',
		'St. Ann\'s',
		'St. Augustine',
		'St. Barb\'s',
		'St. Clair',
		'St. Helena',
		'St. James',
		'St. Joseph',
		'St. Mary\'s',
		'Saint Madeleine',
		'San Fernando',
		'San Francique',
		'San Juan',
		'San Raphael',
		'Sans Souci',
		'Sangre Chiquito',
		'Sangre Grande',
		'Santa Cruz',
		'Santa Flora',
		'Santa Margarita',
		'Santa Rosa',
		'Savonetta',
		'Scarborough',
		'Signal Hill',
		'Siparia',
		'South Oropouche',
		'Speyside',
		'Studley Park',
		'Syne Village',
		'Tabaquite',
		'Tacarigua',
		'Talparo',
		'Techier Village',
		'Thick Village',
		'Third Company',
		'Toco',
		'Tortuga',
		'Trincity',
		'Trou Macaque',
		'Tunapuna',
		'Union Village',
		'Valencia',
		'Valsayn',
		'Vega de Oropouche',
		'Vessigny',
		'Vistabella',
		'Waterloo',
		'Westmoorings',
		'Whiteland',
		'Williamsville ',
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

function job_title()
{
	$list = 
	[
		[
			'title' => 'Minister of Religion',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Managing Director, Director or  Manager',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Professionals (University Graduates)',
			'label' => 'Qualification',
			'help' => 'The level of certification.',
		],
		[
			'title' => 'Member of Parliament',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Mayor',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Borough or County Councilor',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Notary Public',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Justice of the Peace',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Commissioner of Affidavits',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Senior Public Servants Range 30+',
			'label' => 'Range',
			'help' => 'Range of public servant officer.',
		],
		[
			'title' => 'Police Officer Corporal+',
			'label' => 'Regimental Number',
			'help' => 'Number issued to officer.',
		],
		[
			'title' => 'Prison Officer II +',
			'label' => 'Regimental Number',
			'help' => 'Number issued to officer.',
		],
		[
			'title' => 'Fire Sub-Officer +',
			'label' => 'Regimental Number',
			'help' => 'Number issued to officer.',
		],
		[
			'title' => 'Member of Defense Force Corporal/Leading Seaman+',
			'label' => 'Regimental Number',
			'help' => 'Number issued to officer.',
		],
		[
			'title' => 'School Principal',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Vice-Principal',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Lecturer',
			'label' => '',
			'help' => '',
		],
		[
			'title' => 'Graduate Teacher  I +',
			'label' => '',
			'help' => '',
		],
	];
	asort($list);
	return $list;
}

function job_title_with_extra()
{
	$list = [];
	foreach (job_title() as $title) {
		if ($title['label']) $list[] = $title['title'];
	}
	return $list;
}