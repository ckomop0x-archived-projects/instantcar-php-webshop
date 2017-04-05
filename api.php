<?php
/**
 * Created by PhpStorm.
 * User: p.klochkov
 * Date: 03.04.17
 * Time: 21:59
 */
$carsData = file_get_contents("data3.json");
$parsedData = json_decode( $carsData, true);

function json_response($message = null, $code = 200) {
	// clear the old headers
	header_remove();

	// set the actual code
	http_response_code($code);

	// set the header to make sure cache is forced
	header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");

	// treat this as json
	header('Content-Type: application/json');
	$status = array(
		200 => '200 OK',
		400 => '400 Bad Request',
		422 => 'Unprocessable Entity',
		500 => '500 Internal Server Error'
	);
	// ok, validation error, or failure
	header('Status: '.$status[$code]);

//	print_r($message);

//	 return the encoded json
	return json_encode(array(
		'status' => $code < 300, // success or not?
		'message' => $message
	));
}
// if you are doing ajax with application-json headers
if (empty($_POST)) {
	$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
}

/*
 * Car reservetion API
 */
if($_POST['request'] == 'reserve') {
	print_r($_POST['articul']);
	function searchForId($id, $array) {
		foreach ($array as $key => $val) {
			if ($val['articul'] === $id) {
				return $key;
			}
		}
		return null;
	}
	$id = searchForId($_POST['articul'], $parsedData['cars']);
	$parsedData['cars'][$id]['reserved'] = true;
	echo json_encode($parsedData);
//	?><!--<pre>--><?//
//	print_r($parsedData['cars'][$id]);
//	?><!--</pre>--><?//
	$my_file = 'data3.json';
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	fwrite($handle, json_encode($parsedData));
}


//echo json_response(file_get_contents("php://input"), 200);
//array usage
/*
 * Send cars data
 */
echo json_response(array('data' => $parsedData), 200);
