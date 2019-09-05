<?php

include './helpers/searchForArticul.php';

$route = '';
/*
 * Parsing current address
*/
$addr = explode("/", $_SERVER["REQUEST_URI"]);
$notFound = false;

$CARS_FILE_NAME = './data/data3.json';
$CARS_DATA = file_get_contents($CARS_FILE_NAME);
$PARSED_DATA = json_decode( $CARS_DATA, true);

if(isset($_SERVER['REDIRECT_QUERY_STRING'])) {
	$get_string = $_SERVER['REDIRECT_QUERY_STRING'];
	parse_str($get_string, $get_array);
} else {
	$get_array = 0;
}

/*
 * Router
 */

// Route to main page
if ($addr[1] == '') {
	$route = 'main-page';
}

// Display 404 error
if ($addr[1] == 'auto'
		&& count($addr) == 3
		&& searchForArticul($addr[2], $PARSED_DATA['cars']) == NULL
		&& searchForArticul($addr[2], $PARSED_DATA['cars']) != 0) {
		header("HTTP/1.0 404 Not Found");
		$notFound = true;
		$title = 'Page not found';
		include 'page.php';

// All ok, we can render router
} elseif ($addr[1] == ''
	|$addr[1] == 'search'
	|$addr[1] == 'auto'
	|count($get_array) >= 2) {
	$title = 'InstantCar';
	include './page.php';
} elseif ($addr[1] != '') {
	header("HTTP/1.0 404 Not Found");
	$notFound = true;
	$title = 'Page not found';
	include 'page.php';
}

