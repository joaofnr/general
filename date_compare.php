<?php
/**
 * Compare two dates. It can be used on usort function callback to sort dates from different sources (e.g. two different arrays)
 * @param string $d1 a date formatted accordingly (Y-m-d 00:00:00)
 * @param string $d2 a second date formatted accordingly (Y-m-d 00:00:00)
 * @return int strtotime($d1) minus strtotime($d2) so it can be ordered from lower to higher and vice-versa
*/
function date_compare($d1,$d2){
    $time1=strtotime($d1['Birthday']);
    $time2=strtotime($d2['Birthday']);
    return $time2-$time1; // or $time1-$time2 if u want ordered from higher to lower
}

// lets try it out? How about playing with star wars and lord of the rings cast?
$StarWars = array(
	array(
		'Name'		=>	'Mark Hammil',
		'Country'	=>  'USA',
		'Birthday'	=>	'1951-09-25'
		),
	array(
		'Name'		=>	'Harrison Ford',
		'Country'	=>  'USA',
		'Birthday'	=>	'1942-07-13'
		),
	array(
		'Name'		=>	'Carrie Fisher',
		'Country'	=>  'USA',
		'Birthday'	=>	'1956-10-21'
		)
	);

$LOR = array(
	array(
		'Name'		=>	'Elijah Wood',
		'Country'	=>  'USA',
		'Birthday'	=>	'1960-01-28'
		),
	array(
		'Name'		=>	'Ian McKellen',
		'Country'	=>  'United Kingdom',
		'Birthday'	=>	'1939-05-25'
		),
	array(
		'Name'		=>	'Viggo Mortensen',
		'Country'	=>  'USA',
		'Birthday'	=>	'1958-10-20'
		),
	);

// so now lets suppose we have to merge those arrays.
$cast = array_merge($StarWars,$LOR);

// In order to sort'em you would do it manually. NOT! Do it using PHP's sort functions! In addition we use our date_compare function.
usort($cast,'date_compare');

//there you go, some cast members ordered by birth date. Lovely.
echo '<pre>';print_r($cast);echo '</pre>';

//Take a look at usort() function: http://php.net/manual/en/function.usort.php